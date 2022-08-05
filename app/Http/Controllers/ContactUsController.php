<?php

namespace App\Http\Controllers;

use App\Models\ContactAddress;
use App\Models\ContactTitles;
use App\Models\GuestUserMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUsTitlesIndex(){
        return view('admin.contactUs.titles.index', ['contactUsTitles' => ContactTitles::first()]);
    }

    public function userMessage(){
        return view('admin.contactUs.message.index', ['messages' => GuestUserMessage::all()]);
    }

    public function userMessageDestroy($id){
        $deletedData = GuestUserMessage::find($id);
        $deletedData->delete();
        return back()->withErrors("Message Deleted Success !");
    }

    public function contactUsTitlesUpdate(Request $request, $id){
        $request->validate(['title' => 'required', 'image' => 'image', 'form_title'=> 'required', 'form_meta_title' => 'required', 'address_title' => 'required', 'address_meta_title' => 'required']);
        $updatableData = ContactTitles::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . "contactBanner." . $image->extension();
            $image->move(public_path('uploads/images/contactUs'), $fileName);
            $updatableData->image = $fileName;
            $updatableData->save();
        }
        return back()->withSuccess('Data updated Success !');
    }

    public function contactAddress(){
        return view('admin.contactUs.address.index', ['contactAddress' => ContactAddress::first()]);
    }

    public function contactAddressUpdate(Request $request, $id){
        // $request->validate([
        //     'phone_title'   => 'required',
        //     'phone_icon'    => 'required',
        //     'phone'         => 'required',
        //     'address_title' => 'required',
        //     'address_icon'  => 'required',
        //     'address'       => 'required',
        //     'email_title'   => 'required',
        //     'email_icon'    => 'required',
        //     'email'         => 'required',
        // ]);
        $updatableData = ContactAddress::where('id', $id)->first();
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        return back()->withSuccess('Data Updated Success !');
    }
}
