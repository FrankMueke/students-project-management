<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Course;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $courses = Course::all();
        
        return view('pages.welcome')->withPosts($posts)->withCourses($courses);

    }
 
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