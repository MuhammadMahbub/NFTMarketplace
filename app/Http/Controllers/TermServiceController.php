<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TermService;
use Illuminate\Http\Request;

class TermServiceController extends Controller
{
    public function index()
    {
        return view('admin.termservice.index',[
            'termservices'=>TermService::all()
        ]);
    }

    public function create()
    {
        return view('admin.termservice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            '*'         => 'required',
        ]);

        TermService::create($request->except('_token') + ['created_at' => Carbon::now()]);

        return redirect()->route('term_service.index')->withSuccess('Term Service Updated Successfully');
    }

    public function show(TermService $termService)
    {
        return view('admin.termservice.show',compact('termService'));
    }


    public function edit(TermService $termService)
    {
        return view('admin.termservice.edit',compact('termService'));
    }


    public function update(Request $request, TermService $termService)
    {
        $termService->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return back()->withSuccess('Term Service Updated Successfully');
    }

    public function destroy(TermService $termService)
    {
        $termService->delete();
        return back()->withDanger('Term Service Deleted Successfully');
    }
}
