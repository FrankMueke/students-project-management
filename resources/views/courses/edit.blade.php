@extends('layouts.main')
@section('title', '|Edit Course')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>Edit Course</h1>
        <form action="{{ route('courses.update', $course->id)}}" method="POST">
            @method('PATCH')
            @csrf 
            <div>
                <label for="code" class="form-group">Course Code</label>
                <input type="text" name="code" value="{{$course->code}}" class="form-control">
            </div>
            <div class="form-div-spacing">
                <label for="name">Course Name</label>
                <input type="text" name="name" class="form-control" value="{{$course->name}}">
            </div>
            <button type="submit" class="btn btn-success btn-block" >Save changes</button>
        </form>
    </div>
</div>
@endsection