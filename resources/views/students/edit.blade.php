@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-4 offset-4">
        <h1>add student to classroom</h1>
        <form action="{{ route('users.store')}}" method="post">
            @csrf 
            <div class="form-group">
                <label for="classroom_id">Classroom</label>
                <select name="classroom_id" id="classroom_id">
                @foreach($classrooms as $classrooms)
                    <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
    </div>
</div>
@endsection
