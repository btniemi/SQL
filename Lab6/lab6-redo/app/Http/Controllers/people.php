<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\people;

class people extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = \App\Models\people::all();

        return view('people.index', ['people' => $people]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
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
            'name' => 'required|max:255',
            'birthdate' => 'required|date',
        ]);

        people::create([
            'name' => $validated['name'],
            'birthdate' => $validated['birthdate'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        dd($people);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        return view('people.edit', ['people' => $people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $validated = $request->validate([
            'name'=> 'required|max:255',
            'birthdate'=> 'required|date',
        ]);

        $people->name = $validated['name'];
        $people->birthdate = $validated['birthdate'];

        $people->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();

        return redirect(url(route('people.index')));
    }
}
