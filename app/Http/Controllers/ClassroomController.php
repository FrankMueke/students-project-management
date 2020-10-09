<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Course;
use App\Post;
use App\User as AppUser;
use Illuminate\Foundation\Auth\User;


class ClassroomController extends Controller
{
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
        $course = DB::table('courses')->get();
        $classrooms = DB::table('classrooms')->where('user_id',auth()->id())->get();
        return view('classrooms.index')->withClassrooms($classrooms)->withCourses($course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id)
    {
        $this->validate($request, array(
            'name' => 'required'
        
        ));
        // $course = Course::find($course_id);
        // $classroom = new Classroom();

        // $classroom->name = $request->name;
        // // $classroom['user_id'] = Auth::user()->id;
        // $classroom->user()->associate($request->user());
        // $classroom->classcode = Str::random(6);
        // $classroom->course()->associate($course);

        $course = Course::find($course_id);
        $classroom = new Classroom();
        
        $classroom->name = $request->name;
        $classroom['user_id'] = Auth::user()->id;
        // $classroom->user()->associate($request->user());
        $classroom->classcode = Str::random(6);
        $classroom->course()->associate($course);


        $classroom->save();

        $request = Session()->flash('success', 'Class created successfully');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::find($id);
       
        $posts = Post::where('classroom_id', $id)->get();
       
        return view('classrooms.show', compact('classroom', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::find($id);
        $courses = Course::where('user_id', auth()->id())->get();
        
        // return the view and pass in the var we previously created
        return view('classrooms.edit')->withClassroom($classroom)->withCourses($courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'course_id' => 'required'
        
        ));
        $classroom = Classroom::find($id);
        $classroom->name = $request->input('name');
        $classroom->course_id= $request->input('course_id');

        $classroom->save();

         $request->Session()->flash('success', 'Class saved sucessfully');

        return redirect()->route('classrooms.show', $classroom->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
