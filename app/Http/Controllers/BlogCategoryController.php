<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blogs.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        BlogCategory::create($request->except('_token') + ['created_at' => Carbon::now()]);

        return redirect()->route('blog_category.index')->withSuccess('Blog Category Created');
    }

    public function edit(BlogCategory $blogCategory)
    {
        $category = BlogCategory::where('id', $blogCategory->id)->first();
        return view('admin.blogs.category.edit', compact('category'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'category_name' =>'required'
        ]);
        $blogCategory = BlogCategory::find($blogCategory)->first();
        $blogCategory->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return redirect()->route('blog_category.index')->withSuccess('Blog Updated Success');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogs = Blog::where($blogCategory->id)->get();
        foreach($blogs as $blog){
            $blog->update([
                'category_id' => NULL,
            ]);
        }
        
        BlogCategory::find($blogCategory->id)->delete();
        return redirect()->route('blog_category.index')->withDanger('Blog Category Deleted');
    }
}
