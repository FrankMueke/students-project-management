<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\Course;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        
        $posts = Post::all();
      

        // return view('posts.index', compact('posts'));
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $classrooms= Classroom::all();
        return view('posts.create', compact('courses'),('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, array(
        //     'title' => 'required|min:5|max:60',
        //     // ' body' => 'required|max:1000',
        // ));
        
        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'slug' => \Str::slug($request->title),
        //     'user_id' =>user()->associate($request->user())
            
        // ]); 
        $this->validate($request,array(
            'title' => 'required|min:5|max:60',
            'body' => 'required',
            'classroom_id' => 'required|integer',
           
            'featured_file' => 'sometimes'
        ));
       
        $post= new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = \Str::slug($request->title);
        $post['user_id'] = Auth::user()->id;
        $post->classroom_id = $request->classroom_id;
     

        //save image
        // if($request->hasFile('featured_file')){
        //     $file = $request->file('featured_file');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $location = public_path('files/' . $filename);
        //     $file ->move($location, $filename);

            

        //     $post->featured_file = $filename;
        // }
        if($request->hasFile('featured_file'))
        {
            $file = $request->file('featured_file');
            $location = public_path('files/');
            $originalFile = $file->getClientOriginalName();
            $filename = strtotime(date('Y-m-d-H:isa')).$originalFile;
            $file ->move($location, $filename);

            $post->featured_file = $filename;
        }

        $post->save();  

        $request->Session()->flash('success', 'Posted successfully');

        // return redirect()->route('blog.single', [$post->slug]);
        return back();

        

        $request->Session()->flash('success', 'Posted successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // $classrooms = Classroom::where('user_id', auth()->id())->get();
        $classrooms = Classroom::get();
        
        
        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withClassrooms($classrooms);
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
        $this->validate($request,array(
            'title' => 'required|min:5|max:60',
            'body' => 'required',
            'classroom_id' => 'required|integer',
           
            'featured_file' => 'sometimes'
        ));
        // Save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = \Str::slug($request->title);
        $post->classroom_id= $request->input('classroom_id');
        $post->body = $request->input('body');

        if ($request->hasFile('featured_file')){
            //add new file

            $file = $request->file('featured_file');
            $location = public_path('files/');
            $originalFile = $file->getClientOriginalName();
            $filename = strtotime(date('Y-m-d-H:isa')).$originalFile;
            $file ->move($location, $filename);

            $post->featured_file = $filename;

            $oldfilename = $post->featured_file;
            //update the db
            $post->featured_file = $filename;
            //delete the old photo
            Storage::delete($oldfilename);
    }
        $post->save();

         $request->Session()->flash('success', 'The blog post was successfully saved!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Post::find($id);
    
        Storage::delete($post->featured_file);

        $post->delete();

        $request->Session()->flash('success', 'The post was Deleted successfully!');

        return redirect()->route('users.author',auth()->id());
    
    }
}

