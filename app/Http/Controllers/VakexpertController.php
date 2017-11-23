<?php

namespace App\Http\Controllers;

use App\vakexpert;
use Illuminate\Http\Request;
use Auth;

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
        $vakexperts = Vakexpert::where(['user_id' => Auth::user()->id])->get();
        return response()->json([
            'vakexperts'    => $vakexperts,
        ], 200);
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
        $this->validate($request, [
            'name'        => 'required|max:255',
            'competentie' => 'required',
            'description' => 'required',
        ]);

        $vakexpert = Vakexpert::create([
            'name'        => request('name'),
            'competentie'   => request('competentie'),
            'description' => request('description'),
            'user_id'     => Auth::user()->id
        ]);

        return response()->json([
            'vakexpert'    => $vakexpert,
            'message' => 'Success'
        ], 200);
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
   public function update(Request $request, Vakexpert $vakexpert)
    {
        $this->validate($request, [
            'name'        => 'required|max:255',
            'competentie' => 'required',
            'description' => 'required',
            
        ]);

        $vakexpert->name = request('name');
        $vakexpert->competentie = request('competentie');
        $vakexpert->description = request('description');
        $vakexpert->save();

        return response()->json([
            'message' => 'Vakexpert updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vakexpert  $vakexpert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vakexpert $vakexpert)
    {
        //
    }
}
