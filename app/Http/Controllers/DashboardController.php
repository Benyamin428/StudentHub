<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Role;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); /** Ensures the user is authenticated */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id; /** Selects the user id of the user that has logged in */
        $user = User::find($user_id); 
        return view('dashboard')->with('posts', $user->posts); /** Returns the blog posts this user has created into their dashboard */
    }
    
}
