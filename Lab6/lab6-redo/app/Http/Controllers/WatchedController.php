<?php

namespace App\Http\Controllers;

use App\Models\watched;
use Illuminate\Http\Request;

class WatchedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watched = \App\Models\watched::all();

        return view('watched.index', ['watched' => $watched]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('watched.create');
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
     * @param  \App\Models\watched  $watched
     * @return \Illuminate\Http\Response
     */
    public function show(watched $watched)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\watched  $watched
     * @return \Illuminate\Http\Response
     */
    public function edit(watched $watched)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\watched  $watched
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, watched $watched)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\watched  $watched
     * @return \Illuminate\Http\Response
     */
    public function destroy(watched $watched)
    {
        //
    }
}
