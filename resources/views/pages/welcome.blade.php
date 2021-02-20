
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="post-create">
                    <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group titles">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        @cannot('isStudent')
                        <div class="form-group titles">
                            <label for="classroom_id">Post In</label>
                            <select name="classroom_id" id="classroom_id" class="form-control">

                                @foreach($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endcannot
                        @can('isStudent')
                        <div class="form-group titles">
                            <label for="classroom">Post In</label>
                            <input type="text" name="classroom_id" value="{{$user->classroom_id}}" readonly class="form-control">
                        </div>
                        @endcan
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
                    <strong><h1 class="feed-centre text-danger"> <img src="https://img.icons8.com/ios-filled/50/000000/activity-feed-2.png"/> Feed</h1></strong>
                    <hr>
                    @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="post-content">
                            <div class="">
                                <div class="post-upic">
                                <img src="uploads/avatars/{{ $post->user->avatar}}" class="author-image ">
                                </div>
                                <span><strong><a class="text-body titles" href='{{ route('users.author', $post->user->id) }}'> {{strtoupper($post->user->name)}}</a></strong> </span>
                                On <span class="post-time">{{ date('M j, Y, h:ia', strtotime ($post->created_at)) }}</span>
                                In <strong><a class="text-body titles" href="{{ route('classrooms.show', $post->classroom->id)}}">{{ strtoupper($post->classroom->name)}} In {{$post->classroom->course->code}}{{$post->classroom->course->name}}</a></strong><br>
                            </div>
                            <div>
                                <span><a href="files/{{$post->featured_file}}" download="{{$post->featured_file}}">{{$post->featured_file}}</a></span>
                            </div>
                            <p class="lead"><a class="text-body bodyfont"  style="text-decoration: none;" href="{{ route('posts.show',$post->id) }}"> {{ $post->body }}</a>
                            </p>
                            <!-- <hr class="my-4"> -->
                            <!-- <div class="center">
                            <img src="https://img.icons8.com/material-rounded/24/000000/topic.png"/>
                            </div> -->
                            <div class="row">
                                <div class="col-md-4">
                                <a href="#"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/facebook-like.png"/></a>
                                </div>
                                <div class="col-md-4">
                                <a href="{{ route('posts.show', $post->id)}}" class="text-danger"><img src="https://img.icons8.com/ios-filled/24/000000/topic.png"/>{{ $post->comments()->count() }}</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#"><img src="https://img.icons8.com/android/24/000000/share.png"/></a>
                                </div>
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