<?php

namespace App\Http\Controllers;

use App\Models\Spatie;
use Illuminate\Http\Request;

class SpatieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.spatie.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spatie  $spatie
     * @return \Illuminate\Http\Response
     */
    public function show(Spatie $spatie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spatie  $spatie
     * @return \Illuminate\Http\Response
     */
    public function edit(Spatie $spatie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spatie  $spatie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spatie $spatie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spatie  $spatie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spatie $spatie)
    {
        //
    }
}
