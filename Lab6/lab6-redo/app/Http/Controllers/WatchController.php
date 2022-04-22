<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;
use App\Models\Watch;
use App\Models\Person;
use App\Models\Movie;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watch = \App\Models\Watch::all();

        return view('watch.index', ['watch' => $watch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies=Movie::all();
        $people=Person::all();
        return view('watch.create', compact('people', 'movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWatchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWatchRequest $request)
    {
        $validated =$request->validate([
            'people_id'=>'required',
            'movie_id'=>'required',
            'stars'=>'required',
            'comments'=>'required',
        ]);

        Watch::create([
            'people_id'=>$validated['people_id'],
            'movie_id'=>$validated['movie_id'],
            'stars'=>$validated['stars'],
            'comments'=>$validated['comments'],
        ]);

        return redirect(route('watch.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function show(Watch $watch)
    {
        dd($watch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function edit(Watch $watch)
    {
        $movies=Movie::all();
        $people=Person::all();
        return view('watch.edit',['watch'=>$watch], compact('people', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWatchRequest  $request
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWatchRequest $request, Watch $watch)
    {
        $validated =$request->validate([
            'people_id'=>'required',
            'movie_id'=>'required',
            'stars'=>'required',
            'comments'=>'required',
        ]);

        $watch->people_id = $validated['people_id'];
        $watch->movie_id = $validated['movie_id'];
        $watch->stars = $validated['stars'];
        $watch->comments = $validated['comments'];

        $watch->save();

        return redirect(route('watch.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watch $watch)
    {
        $watch->delete();

        return redirect(route('watch.index'));
    }
}
