<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\HomeTitle;
use App\Models\NftModule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function bannerIndex(){
        return view('admin.banners.index', ['banner' => Banner::first()]);
    }

    public function bannerUpdate(Request $request, $id){
        $request->validate([
            'title'     => 'required',
            'sub_title' => 'required',
            'btn1_text' => 'required',
            'btn1_url'  => 'required',
            'btn2_text' => 'required',
            'btn2_url'  => 'required',
            'image'     => 'image'
        ]);
        $banner = Banner::where('id', $id)->first();
        $banner->update($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('image')){
            $image         = $request->file('image');
            $location      = public_path('uploads/images/banner');
            $fileName      = uniqid() . "image." . $image->extension();
            $image->move($location, $fileName);
            $banner->image = $fileName;
            $banner->save();
        }
        return back()->withSuccess('Data Updated Success !');
    }

    public function nftModuleIndex(){
        return view('admin.nftModule.index', ['nftModule' => NftModule::all()]);
    }

    public function nftModuleCreate(){
        return view('admin.nftModule.create');
    }

    public function nftModuleStore(Request $request){
        $request->validate(['icon' => 'required', 'title' => 'required', 'description' => 'required']);
        NftModule::create($request->except('_token') + ['created_at' => Carbon::now()]);
        return redirect()->route('nftModule.index')->withSuccess('Data Store Success !');
    }

    public function nftModuleEdit($id){
        $nftModule = NftModule::where('id', $id)->first();
        return view('admin.nftModule.edit', compact('nftModule'));
    }

    public function nftModuleUpdate(Request $request, $id){
        $request->validate(['icon' => 'required', 'title' => 'required', 'description' => 'required']);

        $nftModule = NftModule::where('id', $id)->first();
        $nftModule->update($request->except('_token') + ['updated_at' => carbon::now()]);
        return back()->withSuccess('Data Update Success');
    }

    public function nftModuleDestroy($id){
        $nftModule = NftModule::where('id', $id)->first();
        $nftModule->delete();
        return back()->withDanger('Data Deleted Success !');
    }

    public function homeTitle(){
        return view('admin.titles.index', ['homeTitle'  => HomeTitle::first()]);
    }

    public function homeTitleUpdate(Request $request, $id){
        $request->validate([
            'collection_title' => 'required',
            'category_title'   => 'required',
            'module_title'     => 'required',
        ]);
        $homeTitle = HomeTitle::first();
        $homeTitle->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('Title Updated Success !');
    }
}
