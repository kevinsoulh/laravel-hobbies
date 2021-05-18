<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hobbies = Hobby::all();

        return view('hobby.index', compact('hobbies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hobbies = new Hobby([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $hobbies->save();

        return $this->index()->with([
            'message_success' => 'Hobby '. $hobbies->name .' was  created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {
        return view('hobby.show', compact('hobby'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {
        

        return view('hobby.edit', compact('hobby'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hobby $hobby)
    {
        

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);

        $hobby->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $this->index()->with([
            'message_success' => 'Hobby '. $hobby->name .' was updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        
        $_hobby = $hobby->name;
        $hobby->delete();

        return $this->index()->with([
            'message_success' => 'Hobby '. $hobby->name .' was deleted'
        ]);
    }
}
