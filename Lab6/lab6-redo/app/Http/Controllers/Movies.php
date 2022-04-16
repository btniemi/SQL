<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\movies;

class Movies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = \App\Models\movies::all();

        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'release_year'=> 'required|year',
            'rating'=>'required'
        ]);

        movies::create([
            'title' => $validated['title'],
            'release_year'=> $validated['release_year'],
            'rating'=>$validated['rating']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movies $movies)
    {
        dd($movies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movies $movies)
    {
        return view('movies.edit', ['movies'=>$movies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movies $movies)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'release_year'=> 'required|year',
            'rating'=>'required'
        ]);

        $movies->title = $validated['title'];
        $movies->birthdate = $validated['release_year'];
        $movies->rating = $validated['rating'];

        $movies->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movies $movies)
    {
        $movies->delete();

        return redirect(url(route('movies.index')));
    }
}
