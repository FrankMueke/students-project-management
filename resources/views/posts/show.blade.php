
@extends('layouts.main')
@section('title', '| View Post')
@section('content')
<div class="row">
    <div class="col-md-6 offset-3">
    <span> <strong><a href='{{ route('users.index', $post->user->id) }}'> {{$post->user->name}}<strong></a> 
    </span>
    On <span class="post-by">{{ date('M j, Y, h:ia', strtotime ($post->created_at)) }}</span>
    <br>
        <p class="lead">{{ $post->body}}</p>
        <hr>
    <div>
    <div class="col-md-8">
    <h3 class="comments-title"><span><svg class="bi bi-chat-quote-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 01-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766c.087.124.163.26.227.401.428.948.393 2.377-.942 3.706a.446.446 0 01-.612.01.405.405 0 01-.011-.59c.419-.416.672-.831.809-1.22-.269.165-.588.26-.93.26C4.775 9.333 4 8.587 4 7.667 4 6.747 4.776 6 5.734 6c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324.085.083.161.174.227.272zM11 9.073c-.269.165-.588.26-.93.26-.958 0-1.735-.746-1.735-1.666 0-.92.777-1.667 1.734-1.667.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324.085.083.161.174.227.272.087.124.164.26.228.401.428.948.392 2.377-.942 3.706a.446.446 0 01-.613.01.405.405 0 01-.011-.59c.42-.416.672-.831.81-1.22z" clip-rule="evenodd"/>
            </svg>    </span>{{ $post->comments()->count() }} Comments</h3>
        @foreach ($post->comments->sortByDesc('id') as $comment)
            <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->user->email))) . "?s=50&f=y" }}"  class="author-image">
                <div class="author-name">    
                    <h4>{{ $comment->user->name }}</h4>
                     <p class="author-time">{{ date('F nS, Y -g:i A' ,strtotime($comment->created_at)) }}</p>
                </div>
                </div>
                <div class="comment-content">
                    {{ $comment->comment }}
                </div>
        @endforeach
    </div>
    <div class="col-md-8">
        <form action="{{ route('comments.store', $post->id)}}" method="post">
            @csrf 
            <div class="form-group">
                <textarea name="comment" id="textarea" cols="50" rows="2" placeholder="Reply here... " class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success  btn-block">Comment</button>
        </form>
    </div>
</div>
@endsection 