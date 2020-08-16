@extends('layouts.main')
@section('title', '| Courses')
@section('content')
<div class="row">
    <div class="col-md-6 offset-1">
        <h1>My courses</h1>
        <table class="form-div-spacing">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code </th>
                    <th>Name </th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($courses as $course)
                <tr>
                    <th>{{ $course->id}} </th>
                    <th>{{ $course->code}} </th>
                    <td><a href="{{ route('courses.show', $course->id)}}">{{ $course->name}} </a></td>     
                </tr>
            @endforeach    
           
            </tbody>
        </table>
        <!-- <button type="submit" class="btn btn-success btn-block"><a href="{{ route('register')}}">Add student to course</a></button> -->
    </div>
    @can('isSupervisor')
    <div class="col-md-3">
        <div class="well">
            <h1>Create a new course</h1>
            <form action="{{ route('courses.store')}}" method="POST">
                @csrf 
                <div>
                    <label for="code" class="form-group">Course Code</label>
                    <input type="text" name="code" class="form-control form-div-spacing">
                </div>
                <div>
                <label for="course" class="form-group">New course</label>
                <input type="text" name="name" class="form-control form-div-spacing">
                </div>

                <button type="submit" class="btn btn-success btn-block">Create new course</button>
            </form>
            
        </div>
    </div>
    @endcan
</div>
@endsection