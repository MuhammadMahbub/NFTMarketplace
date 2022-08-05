<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

     /**
     * Construct
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('verified');
        // $this->middleware('checkAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.generalSettings.index', [
            'generalSettings' => GeneralSetting::first()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        // Form Validation
        $request->validate([
            'logo'              => 'image',
            'favicon'           => 'image',

            'app_title'        => 'required',
            'footer_description'  => 'required',
            'site_designer'  => 'required',
            'designer_route'  => 'required',
        ]);

         //  Logo
         if($request->hasFile('logo')){

            $logo = $request->file('logo');
            $filename = 'logo.'. $logo->extension('logo');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo = $filename;

        }
         if($request->hasFile('logo_dark')){

            $logo = $request->file('logo_dark');
            $filename = 'logo_dark.'. $logo->extension('logo_dark');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo_dark = $filename;

        }

        //  Favicon
        if($request->hasFile('favicon')){

            $favicon = $request->file('favicon');
            $favicon_filename = 'favicon.'. $favicon->extension('favicon');
            $favicon_location = public_path('uploads/generalSettings/');
            $favicon->move($favicon_location, $favicon_filename);

            $generalSetting->favicon = $favicon_filename;
        }

        $generalSetting->app_title        = $request->app_title;
        $generalSetting->footer_description  = $request->footer_description;
        $generalSetting->site_designer  = $request->site_designer;
        $generalSetting->designer_route  = $request->designer_route;


        $generalSetting->save();

        return back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
