<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TermService;
use Illuminate\Http\Request;

class TermServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.termservice.index',[
            'termservices'=>TermService::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.termservice.create');
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
            '*'         => 'required',
        ]);

        TermService::create($request->except('_token') + ['created_at' => Carbon::now()]);

        return redirect()->route('term_service.index')->withSuccess('Term Service Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermService  $termService
     * @return \Illuminate\Http\Response
     */
    public function show(TermService $termService)
    {
        return view('admin.termservice.show',compact('termService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermService  $termService
     * @return \Illuminate\Http\Response
     */
    public function edit(TermService $termService)
    {
        return view('admin.termservice.edit',compact('termService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermService  $termService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermService $termService)
    {
        $termService->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return back()->withSuccess('Term Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermService  $termService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermService $termService)
    {
        $termService->delete();
        return back()->withDanger('Term Service Deleted Successfully');
    }
}
