<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function __construct()
    // {
    //     return $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function author($id)
    {

        $user = User::find($id);
        // $posts=Post::where('user_id', $user->id);
        $posts = $user->posts()->get();

        return view('users.author')->withPosts($posts)->withUser($user);
    }
    public function index()
    {
        $users = User::where('supervisor_id',auth()->id())->get();

        return view('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = DB::table('courses')->where('user_id', auth()->id())->get();
        if(!\Gate::allows('isAdmin'))
        {
            abort(403, "Sorry, you cannot do these actions");
        }
       
        return view('users.create',compact('courses'));
    }
    public function addstudenttoclass()
    {
        if(!\Gate::allows('isAdmin'))
        {
            abort(403, "Sorry, you cannot do these actions");
        }
        return view('users.createstudent');
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'user_type' => 'required|string',
            'password' => 'required|min:8|string|confirmed'
        ));
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->supervisor_id = $request->supervisor_id;
        $user->classroom_id = $request->classroom_id;
        $user->course_id = $request->course_id;
        $user->department = $request->department;
        $user->regno = $request->regno;
        $user->password = Hash::make($request->password);

        $user->save();
        $request->session()->flash('success','User created sucessfully');

        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $users = User::where('supervisor_id',auth()->id())->get();
  
        $posts = Post::where('user_id', Auth::id())->get();
        
        return view('users.show')->withUser($user)->withPosts($posts)->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $classrooms = Classroom::WHERE('user_id', auth()->id())->get();

        return view('users.edit')->withUser($user)->withClassrooms($classrooms);
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
        $user = User::find($id);

        $this->validate($request, array(
            'name'=> 'required',
            'email' => 'required|email',
            'avatar' => 'sometimes|image',
            'university' => 'sometimes',
            'department'=> 'sometimes',
            'yos'=> 'sometimes'
        ));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->university = $request->university;
        $user->department = $request->department;
        $user->yos = $request->yos;
        $user->classroom_id = $request->classroom_id;
        $user->regno = $request->regno;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
        }

        $user->save();

        $request->Session()->flash('success', 'User profile updated successfully');

        return redirect()->back();
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
