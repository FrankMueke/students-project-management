
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="post-create">
                    <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="course">Post In</label>
                            <select name="course_id" id="course_id" class="form-control">

                                @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group textareacont">
                            <label for="body">Message </label>
                            <button type="submit" class="submit_btn btn btn-success btn-block form-div-spacing">Send</button>
                            <textarea class="txtarea" name="body" type="text" id="textarea" cols="20" rows="2" class="form-control" placeholder="What's in your mind?"></textarea>
                        </div>
                        <div >
                            <label for="featured_file">Attach File <img src="https://www.glyphicons.com/img/glyphicons/basic/2x/glyphicons-basic-63-paperclip@2x.png" alt=""></label>
                            <input type="file" name="featured_file" class="form-control form-div-spacing">
                        </div>
                        
                    </form>
            </div>
            
            <div class="panel">
                    <h1 class="feed-centre">Feed</h1>
                    <hr>
                    @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="post-content">
                            <div class="">
                                <div class="post-upic">
                                <img src="uploads/avatars/{{ $post->user->avatar}}" class="author-image ">
                                </div>
                                <span><strong><a class="text-body" href='{{ route('users.index', $post->user->id) }}'> {{strtoupper($post->user->name)}}</a></strong> </span>
                                On <span class="post-time">{{ date('M j, Y, h:ia', strtotime ($post->created_at)) }}</span>
                                In <strong><a class="text-body" href="{{ route('courses.show', $course->id)}}">{{ $course->code}}. {{ strtoupper($course->name)}}</a></strong><br>
                            </div>
                            <div>
                                <span><img class="glys" src="https://www.glyphicons.com/img/glyphicons/halflings/2x/glyphicons-halflings-117-arrow-down@2x.png" alt=""><a href="files/{{$post->featured_file}}" download="{{$post->featured_file}}">{{$post->featured_file}}</a></span>
                            </div>
                            <p class="lead"><a class="text-body"  style="text-decoration: none;" href="{{ route('posts.show',$post->id) }}"> {{ $post->body }}</a>
                            </p>
                            <!-- <hr class="my-4"> -->
                            <div >
                            <img class="glys" src="https://www.glyphicons.com/img/glyphicons/basic/2x/glyphicons-basic-238-chat-message@2x.png" alt="">
                            </div>
                        </div>
                    @endforeach
                    @else
                                <h1> No posts yet</h1>
                    @endif
                  </div>
                 
        </div>
    </div>
</div>
@endsection 