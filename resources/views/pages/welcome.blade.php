
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
                            <select name="classroom_id" id="classroom_id" class="form-control">

                                @foreach($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" textareacont">
                        <input type="file" id="myFileInput" name="featured_file"/>
                            <label for="featured_file"> <img onclick="document.getElementById('myFileInput').click()" src="https://img.icons8.com/metro/32/000000/attach.png" alt="attach file"></label>
                           
                            <textarea class="txtarea" name="body" type="text" id="textarea" cols="20" rows="2" class="form-control" placeholder="What's in your mind?"></textarea>
                            
                            <button type="submit" class="submit_btn"> <img src="https://img.icons8.com/small/32/000000/filled-sent.png"/></button>
                        </div>
                        <!-- <div >
                            <input type="file" id="myFileInput" name="featured_file"/>
                            <label for="featured_file"> <img onclick="document.getElementById('myFileInput').click()" src="https://img.icons8.com/metro/26/000000/attach.png" alt="Download Icon"></label>
                        </div> -->
                        
                    </form>
            </div>
            
            <div class="panel">
                    <h1 class="feed-centre"> <img src="https://img.icons8.com/ios-filled/50/000000/activity-feed-2.png"/> Feed</h1>
                    <hr>
                    @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="post-content">
                            <div class="">
                                <div class="post-upic">
                                <img src="uploads/avatars/{{ $post->user->avatar}}" class="author-image ">
                                </div>
                                <span><strong><a class="text-body" href='{{ route('users.author', $post->user->id) }}'> {{strtoupper($post->user->name)}}</a></strong> </span>
                                On <span class="post-time">{{ date('M j, Y, h:ia', strtotime ($post->created_at)) }}</span>
                                In <strong><a class="text-body" href="{{ route('classrooms.show', $classroom->id)}}">{{ strtoupper($post->classroom->name)}} In {{$post->classroom->course->code}}{{$post->classroom->course->name}}</a></strong><br>
                            </div>
                            <div>
                                <span><img src="https://img.icons8.com/metro/26/000000/download.png"/><a href="files/{{$post->featured_file}}" download="{{$post->featured_file}}">{{$post->featured_file}}</a></span>
                            </div>
                            <p class="lead"><a class="text-body"  style="text-decoration: none;" href="{{ route('posts.show',$post->id) }}"> {{ $post->body }}</a>
                            </p>
                            <!-- <hr class="my-4"> -->
                            <div class="center">
                            <img src="https://img.icons8.com/material-rounded/24/000000/topic.png"/>
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