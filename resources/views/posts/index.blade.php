
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
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
                                In <strong><a class="text-body" href="{{ route('classrooms.show', $post->classroom->id)}}">{{ strtoupper($post->classroom->name)}}</a></strong><br>
                            </div>
                            <div>
                                <span><img class="glys" src="https://www.glyphicons.com/img/glyphicons/halflings/2x/glyphicons-halflings-117-arrow-down@2x.png" alt=""><a href="files/{{$post->featured_file}}" download="{{$post->featured_file}}">{{$post->featured_file}}</a></span>
                            </div>
                            <p class="lead"><a class="text-body"  style="text-decoration: none;" href="{{ route('posts.show',$post->id) }}"> {{ $post->body }}</a>
                            </p>
                            
                            <div >
                           <div class="row">
                                <div class="col-md-4">
                                <a href="#"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/facebook-like.png"/></a>
                                </div>
                                <div class="col-md-4">
                                <a href="{{ route('posts.show', $post->id)}}"><img src="https://img.icons8.com/ios-filled/24/000000/topic.png"/></a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#"><img src="https://img.icons8.com/android/24/000000/share.png"/></a>
                                </div>
                           </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    No posts yet
                    @endif
                  </div>
                 
        </div>
    </div>
</div>
@endsection 