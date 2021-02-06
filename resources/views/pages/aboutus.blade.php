@extends('layouts.main')
@section('title', '|About Us')
@section('content')

          <div class="row">
              <div class="col-md-8 offset-2">
                  <h1>About Us</h1>
                  <p class="bodyfont">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                      ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                      nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                      sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <!--46 <img src="uploads/avatars/{{ $post->user->avatar}}" class="author-image "> -->
                     <!-- 50 In <strong><a class="text-body titles" href="{{ route('classrooms.show', $post->classroom->id)}}">{{ strtoupper($post->classroom->name)}} In {{$post->classroom->course->code}}{{$post->classroom->course->name}}</a></strong><br> -->
                      <!-- 48 <span><strong><a class="text-body titles" href='{{ route('users.author', $post->user->id) }}'> {{strtoupper($post->user->name)}}</a></strong> </span> -->
              </div>
          </div>
@endsection  