<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobby;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        
        $hobbies = Hobby::select()
        ->where('user_id', auth()->id())
        ->orderby('updated_at', "DESC")
        ->get();

        return view('home')->with([
            'hobbies' => $hobbies,
        ]);
    }
}
