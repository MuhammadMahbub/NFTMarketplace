<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {   $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->title) . "_" . Str::random(9).time();

        $request->validate([
            'title'         => 'required',
            'category_id'   => 'required',
            'description'   => 'required',
            'main_image'    => 'required|image',
        ]);

        $blog = Blog::create($request->except('_token') + [
            'created_at'  => Carbon::now(),
            'user_id'     => Auth::user()->id,
            'author_name' => Auth::user()->name,
            'slug'        => $slug,
        ]);

        $location         = public_path('uploads/images/blog');

        if($request->hasFile('main_image')){
            $main_image       = $request->file('main_image');
            $fileName         = uniqid() . "main_image." . $main_image->extension();
            $main_image->move($location, $fileName);
            $blog->main_image = $fileName;
        }

        if($request->hasFile('image1')){
            $image1       = $request->file('image1');
            $fileName1    = uniqid() . "first_image." . $image1->extension();
            $image1->move($location, $fileName1);
            $blog->image1 = $fileName1;
        }

        if($request->hasFile('image2')){
            $image2       = $request->file('image2');
            $fileName2    = uniqid() . "second_image." . $image2->extension();
            $image2->move($location, $fileName2);
            $blog->image2 = $fileName2;
        }

        if($request->hasFile('author_image')){
            $author_image = $request->file('author_image');
            $fileName3    = uniqid() . "author_image." . $author_image->extension();
            $author_image->move($location, $fileName3);
            $blog->author_image = $fileName3;
        }

        $blog->save();
        return redirect()->route('blogs.index')->withSuccess('Blog Created Success !');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'category_id'   => 'required',
            'title'         => 'required',
            'description'   => 'required',
        ]);
        $blog->update($request->except('_token') + [
            'created_at'       => Carbon::now(),
            'user_id'          => Auth::user()->id,
            'author_name'      => Auth::user()->name,
        ]);

        $location         = public_path('uploads/images/blog');

        if($request->hasFile('main_image')){
            $main_image       = $request->file('main_image');
            $fileName         = uniqid() . "main_image." . $main_image->extension();
            $main_image->move($location, $fileName);
            $blog->main_image = $fileName;
        }

        if($request->hasFile('image1')){
            $image1       = $request->file('image1');
            $fileName1         = uniqid() . "first_image." . $image1->extension();
            $image1->move($location, $fileName1);
            $blog->image1 = $fileName1;
        }

        if($request->hasFile('image2')){
            $image2       = $request->file('image2');
            $fileName2         = uniqid() . "second_image." . $image2->extension();
            $image2->move($location, $fileName2);
            $blog->image2 = $fileName2;
        }

        if($request->hasFile('author_image')){
            $author_image       = $request->file('author_image');
            $fileName3    = uniqid() . "author_image." . $author_image->extension();
            $author_image->move($location, $fileName3);
            $blog->author_image = $fileName3;
        }

        $blog->save();
        return redirect()->route('blogs.index')->withSuccess('Blog Updated Success !');
    }

    public function destroy(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $blog->delete();
        return redirect()->route('blogs.index')->withDanger('Blog Deleted Success !');
    }
}
