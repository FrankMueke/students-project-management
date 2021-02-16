@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="col-md-10 offset-1">
            
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>RegNO</th>
                    <th>University</th>
                    <th>YearOfStudy</th>
              
                </thead> 
    
                <tbody>
    
                    @foreach($users as $user)
    
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td><a href="{{route('users.author', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{ $user->department}}</td>
                        <td>{{ $user->regno}}</td>
                        <td>{{ $user->university}}</td>
                        <td>{{ $user->yos}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
</div>
@endsection