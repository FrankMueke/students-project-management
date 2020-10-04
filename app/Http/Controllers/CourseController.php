<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\User;
use App\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\UserController;

class CourseController extends Controller
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
        $courses = DB::table('courses')->get();
        return view('courses.index')->withCourses($courses);
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
    public function store(Request $request)
    {
        $this->validate($request, array(
            'code'=>'required|min:7|max:9|unique:courses,code',
            'name' => 'required'
        ));
        $course = new Course;
        
        $course->name = $request->name;
        $course->code = $request->code;
        $course['user_id'] = Auth::user()->id;
            

        $course->save();

        $request = Session()->flash('success', 'New course created successfully');

        return redirect()->route('courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $course = Course::find($id);
        // $classroom = Classroom::where('course_id', $id)->get();
        // $posts = Post::where('classroom_id', $id)->get();

        // return view('courses.show')->withCourse($course)->withClassroom($classroom)->withPosts($posts);
        $course = Course::find($id);
        $classroom = Classroom::where('course_id', $id)->get();
        
        return view('courses.show', compact('course', 'classroom'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('courses.edit', compact('course'));
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
        $course = Course::find($id);

        $this->validate($request, array(
            'code' => "required|min:7|max:9|unique:courses,code,$id",
            'name' => 'required'
        ));
        $course->name = $request->name;
        $course->code = $request->code;
        $course['user_id'] = Auth::user()->id;
        

        $course->save();

        $request = session()->flash('sucess', 'Course edited successfully');

        return redirect()->route('courses.show', $course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->posts()->detach;
        $course->user()->detach;

        $course->delete();
    }
}
