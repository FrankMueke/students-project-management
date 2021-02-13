@extends('layouts.main')
@section('title', '|Grade') 
@section('content')

<div class="row">
    <div class="col-md-6 offset-3">
        <form action="{{ route('grades.update', $grade->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH')
            <div class="form-group">
                <img class="avatarstyle" src="/uploads/avatars/{{$user->avatar}}" alt="Avatar">
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="proposal">Proposal Verdit</label>
                <input type="text" name="proposal" value="{{$grade->proposal}}" class="form-control">
                <select name="proposal" id="proposal">
                    <option value="pass">Pass</option>
                    <option value="fail">Fail</option>
                </select>
            </div>
            <div class="form-group">
                <label for="progress">Progress score</label>
                <input type="text" name="progress" value="{{$grade->proposal}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="final">Final Score</label>
                <input type="text" name="final" value="{{$grade->final}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" value="{{$grade->total}}" class="form-control">
            </div>
        
           <button type="submit" class="pull-right btn btn-sm btn-primary">Update Grade</button>
        </form>
    </div>
</div>
@endsection