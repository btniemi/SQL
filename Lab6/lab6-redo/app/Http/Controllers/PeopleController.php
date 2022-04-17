<?php

namespace App\Http\Controllers;

use App\Models\people;
use Illuminate\Http\Request;

class PeopleController extends Controller
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
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function show(people $people)
    {
        dd($people);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(people $people)
    {
        return view('people.edit', ['people' => $people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, people $people)
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
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(people $people)
    {
        $people->delete();

        return redirect(url(route('people.index')));
    }
}
