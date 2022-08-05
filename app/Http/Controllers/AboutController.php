<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\AboutCount;
use App\Models\TeamBanner;
use App\Models\AboutHeader;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutHeaderIndex(){
        return view('admin.about.header.index', ['headerInfo' => AboutHeader::first()]);
    }

    public function aboutHeaderUpdate(Request $request, $id){
        $request->validate(['title' => 'required', 'meta_title' => 'required', 'video_url' => 'required']);
        $updatableData = AboutHeader::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('Data Updated Success !');
    }

    public function aboutCountIndex(){
        return view('admin.about.count.index', ['countInfo' => AboutCount::first()]);
    }

    public function aboutCountUpdate(Request $request, $id){
        $request->validate(['title' => 'required', 'founded_value' => 'required', 'nft_created_value' => 'required', 'total_users_value' => 'required']);
        $updatableData = AboutCount::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => carbon::now()]);
        return back()->withSuccess("Data Updated Success");
    }

    public function teamBannerIndex(){
        return view('admin.about.teamBanner.index', ['teamBanner'=> TeamBanner::first()]);
    }

    public function teamBannerUpdate(Request $request, $id){
        $request->validate(['title' => 'required', 'meta_title' => 'required', 'description' => 'required', 'launch_product_text_value' => 'required', 'satisfaction_rate_value' => 'required']);
        $updatableData = TeamBanner::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $location = public_path('uploads/images/about/teamBanner');
            $fileName = uniqid() . 'TeamBannerImage.' . $image->extension();
            $image->move($location, $fileName);
            $updatableData->image = $fileName;
            $updatableData->save();
        }
        return back()->withSuccess('Data Updated Success !');
    }

    public function teamIndex(){
        return view('admin.about.team.index', ['teams' => Team::all()]);
    }

    public function teamCreate(){
        return view('admin.about.team.create');
    }

    public function teamStore(Request $request){
        $request->validate(['image' => 'required', 'name' => 'required', 'designation' => 'required']);
        $team = Team::create($request->except('_token') + ['created_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . "teamMamber." . $image->extension();
            $location = public_path('uploads/images/about/team');
            $image->move($location, $fileName);
            $team->image = $fileName;
            $team->save();
        }
        return redirect()->route('team')->withSuccess('Mamber Created Successfull !');
    }

    public function teamEdit($id){
        return view('admin.about.team.edit', ['team' => Team::where('id', $id)->first()]);
    }

    public function teamUpdate(Request $request, $id){
        $request->validate(['name' => 'required', 'designation' => 'required']);
        $updatableData = Team::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . "teamMamber." . $image->extension();
            $location = public_path('uploads/images/about/team');
            $image->move($location, $fileName);
            $updatableData->image = $fileName;
            $updatableData->save();
        }
        return redirect()->route('team')->withSuccess('Mamber Updated Successfull !');
    }

    public function teamDestroy($id){
        Team::where('id', $id)->delete();
        return redirect()->route('team')->withDanger('Member Deleted Success !');
    }
}
