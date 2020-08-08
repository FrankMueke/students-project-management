@extends('layouts.main')
@section('title', '|Edit Course')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>Edit Course</h1>
        <form action="{{ route('courses.update', $course->id)}}" method="get">
            @method('PATCH')
            @csrf 
            <label for="code" class="form-group">Course Code</label>
            <input type="text" name="code" value="{{$course->code}}" class="form-control">

            <button type="submit" class="btn btn-success btn-block" >Save changes</button>
        </form>
    </div>
</div>
@endsection