<?php

namespace App\Http\Controllers;

use App\Hobby;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;
use App\ImageController;

class HobbyController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hobbies = Hobby::orderBy('updated_at', 'DESC')->paginate(10);

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
            'user_id' => auth()->id()
        ]);
        $hobbies->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby, Tag $tag)
    {
        $allTags = Tag::all();
        $usedTags = $hobby->tags;
        $availableTags = $allTags->diff($usedTags);
        return view('hobby.show', compact('hobby', 'availableTags'));
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
            'image' => 'mimes:jpeg, jpg, bmp, png, gif'
        ]);

        if ($request->image) {
            $this->saveImages($request->image, $hobby->id);
        }

        $hobby->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $this->index();
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

        return redirect('/home');
    } 

    public function saveImages($imageInput, $hobby_id){

        $image = Image::make($imageInput);
        if ( $image->width() > $image->height() ) { // Landscape
            $image->widen(1200)
                ->save(public_path() . "/img/hobbies/" . $hobby_id . "_large.jpg")
                ->widen(400)->pixelate(12)
                ->save(public_path() . "/img/hobbies/" . $hobby_id . "_pixelated.jpg");
            $image = Image::make($imageInput);
            $image->widen(60)
                ->save(public_path() . "/img/hobbies/" . $hobby_id . "_thumb.jpg");
        } else { // Portrait
            $image->heighten(900)
                ->save(public_path() . "/img/hobbies/" . $hobby_id . "_large.jpg")
                ->heighten(400)->pixelate(12)
                ->save(public_path() . "/img/hobbies/" . $hobby_id . "_pixelated.jpg");
            $image = Image::make($imageInput);
            $image->heighten(60)
                ->save(public_path() . "/img/hobbies/" . $hobby_id . "_thumb.jpg");
        }

    }

    public function deleteImages($hobby_id){
        if(file_exists(public_path() . "/img/hobbies/" . $hobby_id . "_large.jpg"))
            unlink(public_path() . "/img/hobbies/" . $hobby_id . "_large.jpg");
        if(file_exists(public_path() . "/img/hobbies/" . $hobby_id . "_thumb.jpg"))
            unlink(public_path() . "/img/hobbies/" . $hobby_id . "_thumb.jpg");
        if(file_exists(public_path() . "/img/hobbies/" . $hobby_id . "_pixelated.jpg"))
            unlink(public_path() . "/img/hobbies/" . $hobby_id . "_pixelated.jpg");

        return back()->with(
            [
                'message_success' => "The Image was deleted."
            ]
        );
    }
}
