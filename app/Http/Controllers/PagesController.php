<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Course;
use App\User;
use App\Classroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function getIndex(){
    //     $posts = Post::all();
    //     $user = Auth::user();
    //     $classrooms =Classroom::all();
        
    //     return view('pages.welcome')->withPosts($posts)->withClassrooms($classrooms)->withUser($user);

    // }
    public function getIndex(){
        $user= Auth::user();
        $posts= Post::where('user_id', auth()->id())->get();
        // $classrooms = Classroom::where('user_id', '=', 'supervisor_id')->get();
        $classrooms = Classroom::all();
            
            return view('pages.welcome')->withPosts($posts)->withClassrooms($classrooms);
    
        }
    // public function getIndex(){
    // $user= Auth::user();
    // $posts= Post::whereIn('classroom_id, function)
        
    // // $classrooms = Classroom::with('posts')->get();
    // return view('pages.welcome')->withPosts($posts)->withUser($user);

    // }
    // public function getIndex(){
    //     $user= Auth::user()->id;
    //     $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    //     // $courses = Course::where('user_id', auth()->id())->get();
    //     $classrooms= Classroom::get();

    //     return view('pages.welcome')->withPosts($posts)->withClassrooms($classrooms);

    // }
 
    public function getAbout(){
        return view('pages.aboutus');

    }
    public function getContact(){
        return view('pages.contactus');
    }

    public function postContact(Request $request)
    {
        $this->validate($request,array(
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodymessage' => $request->message
        );
        Mail::send('emails.contact', $data, function($message) use ($data)
    {
        $message->from($data['email']);
        $message->to('frankmueke98@gmail.com');
        $message->subject($data['subject']);
    });
    $request->Session()->flash('success', 'Your Email was sent successfully');

    return redirect()->route('home');
    }
   
}
