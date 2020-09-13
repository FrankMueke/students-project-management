@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-8">
        
    <dl>
        <dt>Classes in {{ $course->code}} {{ $course->name}}</dt>
        
        <dd><a href="{{ route('classrooms.show', $classroom->id)}}">{{$classroom->id}}  {{$classroom->name}} </a></dd>
    </dl>
          
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
    @can('isSupervisor')
            
            <div class="col-md-4 offset-8">
                <h3>Create a new class</h3>
                <form action="{{ route('classrooms.store', $course->id)}}" method="POST">
                    @csrf 
                    <div>
                        <label for="name" class="form-group">New classroom</label>
                        <input type="text" name="name" class="form-control form-div-spacing">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create new classroom</button>
                </form>

            </div>
        
        @endcan
</div>
@endsection