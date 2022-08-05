<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function index()
    {
        return view('admin.newsletter.index', [
            'newsletter' => Newsletter::first(),
        ]);
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'meta_title' => 'required',
        ]);
        $request->validate(['title' => 'required']);
        $newsletter = Newsletter::find($newsletter->id)->first();
        $newsletter->update($request->except('_token') + ['created_at' => Carbon::now()]);
        $location   = public_path('uploads/images/newsletter');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid() . "newsletter_image." . $image->extension();
            $image->move($location, $fileName);
            $newsletter->image = $fileName;
            $newsletter->save();
        }
        return back()->withSuccess('Newsletter Updated Success');
    }

}
