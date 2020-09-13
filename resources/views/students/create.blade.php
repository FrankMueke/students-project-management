@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-4 offset-4">
        <h1>Create a new student</h1>
        <form action="{{ route('users.store')}}" method="post">
            @csrf 
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_type">User Type</label>
                <select name="user_type" id="user_type">
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <select name="supervisor_id" id="supervisor">
                @foreach($supervisors as $supervisor)
                    <option value="{{$supervisor->id}}">Lec. {{$supervisor->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="classroom">Classroom</label>
                <select name="classroom_id" id="classroom">
                @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}"> {{$classroom->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirm">Confirm password</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form>
    </div>
</div>
@endsection
