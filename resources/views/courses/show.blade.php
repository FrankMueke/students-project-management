@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-8">
    
        <h1>{{ $course->code}}</h1>
        <h1>{{ $course->name}}</h1>
  
    </div>
    <div class="col-md-2">
        <a href="{{ route('courses.edit', $course->id)}}" class="btn btn-success btn-block">Edit</a>
    </div>
    <div class="col-md-2">
        <form action="{{ route('courses.destroy', $course->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Delete Course</button>
        </form>
    </div>
</div>
@endsection