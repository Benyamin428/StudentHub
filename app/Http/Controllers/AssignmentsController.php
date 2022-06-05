<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Assignment;
use App\Subject;
use App\User;
use App\userSubject;
use App\assignmentSubject;



class AssignmentsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /** Retrieves assignments that are relevant to the users' subjects */

        $user = Auth::id();

        $userSubject = userSubject::select('subject_id')->where('user_id', $user)->get();

        $assignmentSubject = assignmentSubject::select('assignment_id')->whereIn('subject_id', $userSubject);

        $assignments = Assignment::whereIn('id', $assignmentSubject)->paginate(10);

        return view('assignments.index', compact('assignments')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $assignment = new Assignment;
        $assignment->title = $request->input('title');
        $assignment->body = $request->input('body');
        $assignment->user_id = auth()->user()->id;
        $assignment->save();
          
        if ($request['maths']) {
            $assignment->subjectsToAssignments()->attach(Subject::where('name', 'Maths')->first());
        }
        if ($request['computer_science']) {
            $assignment->subjectsToAssignments()->attach(Subject::where('name', 'Computer Science')->first());
        }
        if ($request['physics']) {
            $assignment->subjectsToAssignments()->attach(Subject::where('name', 'Physics')->first());
        }

        return redirect('assignments')->with('success', 'Assignment Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        return view('assignments.show')->with('assignment', $assignment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Assignment::find($id);


        $post->delete();
        return redirect('assignments')->with('success', 'Post Deleted');
    }
}
