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
           <button type="submit" class="pull-right btn btn-sm btn-primary">Update Profile</button>
        </form>
    </div>
</div>
@endsection