<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get();
        if(!isset($profiles[0])){
            return view('home', compact('user'));
        }
        $profile = $profiles[0];
        return view('home', compact('profile', 'user'));
    }
}
