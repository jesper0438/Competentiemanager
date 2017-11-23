<?php

namespace App\Http\Controllers;

use App\vakexpert;
use Illuminate\Http\Request;

class VakexpertController extends Controller
{
        //Only vissible after authentication
        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\vakexpert  $vakexpert
     * @return \Illuminate\Http\Response
     */
    public function show(vakexpert $vakexpert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vakexpert  $vakexpert
     * @return \Illuminate\Http\Response
     */
    public function edit(vakexpert $vakexpert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vakexpert  $vakexpert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vakexpert $vakexpert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vakexpert  $vakexpert
     * @return \Illuminate\Http\Response
     */
    public function destroy(vakexpert $vakexpert)
    {
        //
    }
}
