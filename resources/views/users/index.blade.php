@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="col-md-10 offset-1">
            
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Classroom</th>
              
                </thead> 
    
                <tbody>
    
                    @foreach($users as $user)
    
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td><a href="{{route('users.author', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{ $user->classroom_id}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
</div>
@endsection