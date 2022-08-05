<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogApiController extends Controller
{
    public function __construct(){
        $this->middleware('api');
    }
    public function index(){
        $blogData = DB::table('blogs')->get();
        return response()->json([$blogData, 200]);
    }
    public function show($id){
        $blogData = Blog::findOrFail($id);
        return response()->json([$blogData, 200]);
    }
    public function update(Request $request, $id){
        $blogData = Blog::findOrFail($id);
        $blogData->title = $request->title;
        $blogData->save();
        return response()->json([$blogData, 200]);
    }
    public function create(){
        $data = Blog::create([
            'title' => request()->title,
            'main_image' => '1.jpg',
            'user_id' => 1,
            'slug' => 'something',
            'description' => request()->description,
            'category_id' => request()->category_id,
            'created_at' => Carbon::now(),
        ]);
        return response()->json([$data, 200]);
    }

    public function destroy($id){
        $data = Blog::findOrFail($id)->delete();
        return response()->json([$data, 200]);
    }
}
