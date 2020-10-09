@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6 offset-2">
        <h3>Welcome to {{$classroom->name}}</h3>
    </div>
    
    @can('isSupervisor')
    <div class="col-md-2">
        <a href="{{ route('classrooms.edit', $classroom->id)}}" class="btn btn-success btn-block">Edit</a>
    </div>
    <div class="col-md-2">
        <form action="{{ route('classrooms.destroy', $classroom->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Delete Classroom</button>
        </form>
    </div>
    @endcan
</div>
<div class="row">
    <div class="col-md-8 offset-2">
    <img src="https://img.icons8.com/ios-filled/50/000000/activity-feed-2.png"/> Posts in {{$classroom->name}}
    @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="post-content">
                            <div class="">
                                <div class="post-upic">
                                <img src="uploads/avatars/{{ $post->user->avatar}}" class="author-image ">
                                </div>
                                <span><strong><a class="text-body" href='{{ route('users.index', $post->user->id) }}'> {{strtoupper($post->user->name)}}</a></strong> </span>
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
@endsection