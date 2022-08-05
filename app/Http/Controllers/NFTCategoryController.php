<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\LikeCollection;
use App\Models\NFTCategory;
use App\Models\ReportCategory;
use Illuminate\Http\Request;

class NFTCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.nftcategory.index', [
            'nft_categories' => NFTCategory::orderBy('name','ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nftcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:n_f_t_categories',
            'icon' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $unique_id = $request->name.uniqid().date('Y');
        $category = NFTCategory::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
            'unique_id' => $unique_id,
            'created_at' => Carbon::now()
        ]);

        $location = public_path('uploads/nftcategory');

        if($request->hasFile('image')){
            $image  = $request->file('image');
            $imageName  = uniqid() . "." .$image->extension();
            $image->move($location, $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('nft_category.index')->withSuccess('Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NFTCategory  $nFTCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.nftcategory.show', [
            'nft_category' => NFTCategory::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NFTCategory  $nFTCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.nftcategory.edit', [
            'nft_category' => NFTCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NFTCategory  $nFTCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $nFTCategory = NFTCategory::find($id);
        $nFTCategory->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        $location = public_path('uploads/nftcategory');

        if($request->hasFile('image')){
            $image  = $request->file('image');
            $imageName  = uniqid() . "." .$image->extension();
            $image->move($location, $imageName);
            $nFTCategory->image = $imageName;
        }
        // if($request->hasFile('creator_photo')){
        //     $creator_photo = $request->file('creator_photo');
        //     $creatorPhotoName = uniqid() . "." .$creator_photo->extension();
        //     $creator_photo->move($location, $creatorPhotoName);
        //     $nFTCategory->creator_photo = $creatorPhotoName;
        // }

        $nFTCategory->save();

        return redirect()->route('nft_category.index')->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NFTCategory  $nFTCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(NFTCategory $nFTCategory, $id)
    {
        $categories = Item::where('category_id', $id)->get();
        foreach($categories as $cat_id){
            $cat_id->update([
                'category_id' => NULL,
            ]);
        }

        $collection_id = LikeCollection::where('collection_id', $id)->get();
        foreach($collection_id as $coll){
            $coll->delete();
        }
        $category_report = ReportCategory::where('category_id', $id)->get();
        foreach($category_report as $report){
            $report->delete();
        }

        NFTCategory::find($id)->delete();
        return redirect()->route('nft_category.index')->withDanger('Deleted Successfully');
    }
}
