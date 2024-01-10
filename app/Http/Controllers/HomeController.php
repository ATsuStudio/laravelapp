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
       
        $acc_user = Auth::user();
        $acc_profile = Profile::where('user_id', $acc_user->id)->first();
        if(!isset($acc_profile)){
            return view('home', compact('acc_user'));
        }

        return view('home', compact('acc_profile', 'acc_user'));
    }
}
