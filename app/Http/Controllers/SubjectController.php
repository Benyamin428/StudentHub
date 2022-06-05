<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Subject;

class SubjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects = Subject::all()->toArray();
        $user = Auth::user();
        return view('add_subject', compact('subjects'), ['user' => $user]);
    }

    public function postSubject(Request $request) 
    {
        $user = User::where('email', $request['email'])->first();
        $user->subjects()->detach();
        if ($request['maths']) {
            $user->subjects()->attach(Subject::where('name', 'Maths')->first());      
        }
        if ($request['computer_science']) {
            $user->subjects()->attach(Subject::where('name', 'Computer Science')->first());      
        }
        if ($request['physics']) {
            $user->subjects()->attach(Subject::where('name', 'Physics')->first());      
        }
        return redirect('add_subject')->with('success', 'Subjects Added');
    }

}
