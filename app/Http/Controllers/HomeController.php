<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobby;
use App\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Hobby $hobbies) {
        $hobbies = Hobby::select()
        ->where('user_id', auth()->id())
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('home', compact('hobbies', 'message_success'));
    }
}
