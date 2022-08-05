<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    /**
     * Construct
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
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
        return view('admin.contacts.index',[
            'contacts' => Contact::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Form Validation
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->except('_token') + ['created_at' => Carbon::now()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        // Return back with success message
        return redirect()->route('contacts.index')->withSuccess('Deleted successfully');
    }
}
