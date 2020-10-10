@extends('layouts.main')
@section('title', '|Edit Classroom')
@section('content')
<div class="row">
    <div class="col-md-4 offset-4">
                <h3>Edit this class</h3>
                <form action="{{ route('classrooms.update', $classroom->id)}}" method="POST">
                @method('PATCH')
                @csrf
                    <div class="form-group">
                        <label for="name" class="form-group form-spacing-top">New classroom</label>
                        <input type="text" name="name" class="form-control form-div-spacing" value="{{$classroom->name}}">
                    </div>
                    <div class="form-group">
                        <label name="course_id" class="form-spacing-top">Course</label>

                        <select name="course_id" class="form-control" id="course_id">
                        @foreach ($courses as $course)
                        <option {{ ($course->id == $classroom->course_id) ? 'selected' : '' }} value="{{ $course->id }}">
                        {{ $course->name }}
                        </option>
                        @endforeach

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                </form>

    </div>
</div>
@endsection