
@extends('layouts.main')
@section('title', '| Create Post')

@section('content')
<div class="row">
    <div class="col-md-6 offset-3">
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
</div>
@endsection 