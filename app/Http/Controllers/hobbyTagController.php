<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Hobby;

class hobbyTagController extends Controller
{

    public function attachTag($hobby_id, $tag_id) {

        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back();

    }

    public function detachTag($hobby_id, $tag_id) {
        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);
        return back();
    }
}   
