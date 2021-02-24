@extends('layouts.main')
@section('title', '|Grade') 
@section('content')

<div class="row">
    <div class="col-md-6 offset-3">
        <form action="{{ route('grades.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
         <div class="form-group">
                <label for="student">Student</label>
                <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="proposal">Proposal Verdit (Pass or Fail)</label>
                <select name="proposal" id="proposal">
                    <option value="pass">Pass</option>
                    <option value="fail">Fail</option>
                </select>
            </div>
            <div class="form-group">
                <label for="progress">Progress score /35</label>
                <input type="text" name="progress" class="form-control" placeholder="0">
            </div>
            <div class="form-group">
                <label for="final">Final Score /65</label>
                <input type="text" name="final" class="form-control" placeholder="0">
            </div>
        
           <button type="submit" class="pull-right btn btn-sm btn-primary">Add Grade</button>
        </form>
    </div>
</div>
@endsection