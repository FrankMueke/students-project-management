
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="panel">
                    <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="course">Post In...</label>
                <select name="course_id" id="course_id">
                    
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name}}</option>
                    @endforeach
                
                </select>
            </div>
            <div class="form-group">
                <label for="body">Message</label>
                <textarea name="body" type="text" id="textarea" cols="20" rows="2" class="form-control" placeholder="What's in your mind?"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Send</button>
        </form>
                  </div>
            
            <div class="panel">
                    <h1 class="display-4 text-danger">Feed</h1>
                    @if(count($posts) > 0)
                    @foreach($posts as $post)
                    <p class="lead">    <a href="{{ route('posts.show',$post->id) }}"> {{ $post->body }}</a>
                    </p>
                    <hr class="my-4">
                    @endforeach
                    @else
                    No posts yet
                    @endif
                  </div>
                 
        </div>
    </div>
</div>
@endsection 