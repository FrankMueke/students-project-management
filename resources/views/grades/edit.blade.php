@extends('layouts.main')
@section('title', '|Grade') 
@section('content')

<div class="row">
    <div class="col-md-6 offset-3">
        <form action="{{ route('grades.update', $grade->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH')
         <div class="form-group">
                <label for="student">Student</label>
                <select name="user_id" id="user_id" readonly>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
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
                <label for="progress">Progress score /35 <label>
                <input type="text" name="progress" value="{{$grade->progress}}" placeholder="0" class="form-control">
            </div>
            <div class="form-group">
                <label for="final">Final Score /65 </label>
                <input type="text" name="final" value="{{$grade->final}}" placeholder="0" class="form-control">
            </div>
            <div class="form-group">
                <label for="total">Total /100</label>
                <input type="text" name="total" value="{{$grade->total}}" readonly class="form-control">
            </div>
        
           <button type="submit" class="pull-right btn btn-sm btn-primary">Update Grade</button>
        </form>
        </div>
    </div>

    <!-- start edit here -->
    <!-- <div class="row">
    <div class="col-md-3">
    <form action="{{ route('grades.update', $grade->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH') 
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
                <input type="text"  value="{{$grade->proposal}}" class="form-control" >
                <select name="proposal" id="proposal">
                    <option value="pass">Pass</option>
                    <option value="fail">Fail</option>
                </select>
            </div>
           <button type="submit" class="pull-right btn btn-sm btn-primary">Add Verdict</button>
        </form>
    </div>
    <div class="col-md-3">
    <form action="{{ route('grades.update', $grade->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH') 
            <div class="form-group">
                <label for="student">Student</label>
                <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="progress">Progress score /35</label>
                <input type="text" name="progress"  value="{{$grade->progress}}"  class="form-control">
            </div>
           <button type="submit" class="pull-right btn btn-sm btn-primary">Add Grade</button>
        </form>
    </div>

    <div class="col-md-3">
    <form action="{{ route('grades.update', $grade->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH') 
            <div class="form-group">
                <label for="student">Student</label>
                <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="final">Final Score /65</label>
                <input type="text" name="final"  value="{{$grade->final}}"  class="form-control">
            </div>
           <button type="submit" class="pull-right btn btn-sm btn-primary">Add Grade</button>
        </form>
    </div>

    <div class="col-md-3">
    <form action="{{ route('grades.update', $grade->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
         @method('PATCH')
            <div class="form-group">
                <label for="student">Student</label>
                <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total">Total Score /100</label>
                <input type="text" name="toial" class="form-control">
            </div>
           <button type="submit" class="pull-right btn btn-sm btn-primary">Add Grade</button>
        </form>
    </div>
</div> -->
    <!-- end edit nhere -->
@endsection