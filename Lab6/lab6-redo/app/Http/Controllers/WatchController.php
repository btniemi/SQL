<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;
use App\Models\Watch;

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
        return view('watch.create');
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
            'peopleId'=>'required',
            'movieId'=>'required',
            'stars'=>'required',
            'comments'=>'required',
        ]);

        Watch::create([
            'peopleId'=>$validated['peopleId'],
            'movieId'=>$validated['movieId'],
            'stars'=>$validated['stars'],
            'comments'=>$validated['comments'],
        ]);
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
        return view('watch.edit',['watch'=>$watch]);
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
            'peopleId'=>'required',
            'movieId'=>'required',
            'stars'=>'required',
            'comments'=>'required',
        ]);

        $watch->peopleId = $validated['peopleId'];
        $watch->movieId = $validated['movieId'];
        $watch->stars = $validated['stars'];
        $watch->comments = $validated['comments'];

        $watch->save();
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

        return redirect(url(route('watched.index')));
    }
}
