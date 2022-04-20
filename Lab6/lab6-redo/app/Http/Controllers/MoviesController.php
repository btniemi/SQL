<?php

namespace App\Http\Controllers;

use App\Models\movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
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
            'release_year'=> 'required|date',
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
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(movies $movies)
    {
        dd($movies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(movies $movies)
    {
        return view('movies.edit', ['movies'=>$movies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movies $movies)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'release_year'=> 'required|date',
            'rating'=>'required'
        ]);

        $movies->title = $validated['title'];
        $movies->release_year = $validated['release_year'];
        $movies->rating = $validated['rating'];

        $movies->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {

        movies::find($movie_id)->delete();

        return redirect(route('movies.index'));
    }
}
