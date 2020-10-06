<?php

namespace App\Http\Controllers;

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
        $course = Course::all();

        // return view('posts.index', compact('posts'));
        return view('posts.index', compact('posts','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('posts.create', compact('courses'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
