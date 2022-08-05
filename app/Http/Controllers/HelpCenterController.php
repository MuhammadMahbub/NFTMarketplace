<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\HelpCenter;
use App\Models\HelpCenterTitle;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.help_center.index',[
            'helps' => HelpCenter::all(),
        ]);
    }

    public function create_title(){
        return view('admin.help_center.create_title', [
            $Help_center_title = HelpCenterTitle::first(),
        ]);
    }

    public function create_title_update(Request $request){

        $request->validate([
            'help_center_title' => 'required',
            'bg_image'          => 'image',
            'category_title'    => 'required',
            'faq_title'         => 'required',
            'faq_meta_title'    => 'required'
        ]);

        $HelpCenterTitle = HelpCenterTitle::first();

        $HelpCenterTitle->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        if($request->hasFile('bg_image')){
            $photo                           = $request->file('bg_image');
            $fileName                        = uniqid() . '.' . $photo->extension();
            $location                        = public_path('uploads/images/help_center');
            $HelpCenterTitle->bg_image       = $fileName;
            $photo->move($location, $fileName);
            $HelpCenterTitle->save();
        }

        return redirect()->route('help_center_title.create')->withSuccess('Help center titles Updated');
    }

    public function create()
    {
        return view('admin.help_center.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:help_centers',
            'description' => 'required',
        ]);

        HelpCenter::create($request->except('_token') + ['created_at' => Carbon::now()]);
        return redirect()->route('help_center.index')->with('success', 'Help Center Added Successfully');
    }

    public function edit(HelpCenter $helpCenter)
    {
        return view('admin.help_center.edit', compact('helpCenter'));
    }

    public function update(Request $request, HelpCenter $helpCenter)
    {
        $request->validate([
            'title'  => 'required',
            'description'  => 'required',
        ]);

        $helpCenter->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return redirect()->route('help_center.index')->withSuccess('HelpCenter Updated');
    }

    public function destroy(HelpCenter $helpCenter)
    {
        $helpCenter->delete();
        return back()->with('warning', 'Deleted Successfully');
    }
}
