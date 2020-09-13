@extends('layouts.main')
<?php $titleTag = htmlspecialchars($user->name); ?>
@section('title', '| ' .e($user->name))
@section('content')

<div class="row">
    <div class="col-md-6 offset-3">
        <form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH')
                <h2>{{ $user->name }}'s Profile</h2>
            <div class="form-group">
                <img class="avatarstyle" src="/uploads/avatars/{{$user->avatar}}" alt="Avatar">
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="university">University</label>
                <input type="text" name="university" value="{{$user->university}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" value="{{$user->department}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="yos">Year of study</label>
                <input type="text" name="yos" value="{{$user->yos}}" class="form-control">
                <select name="yos" id="yos">
                    <option value="4.1">4.1</option>
                    <option value="4.2">4.2</option>
                    <option value="5.1">5.1</option>
                    <option value="5.2">5.2</option>
                </select>
            </div>
            @can('isStudent')
            <div class="form-group">
                <label for="classcode">Enter code to join</label>
                <input type="text" name="classcode" class="form-control">
            </div>
            @endcan
           <button type="submit" class="pull-right btn btn-sm btn-primary">Update Profile</button>
        </form>
    </div>
</div>
@endsection