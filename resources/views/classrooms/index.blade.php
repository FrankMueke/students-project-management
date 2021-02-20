@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6 offset-2">
        <h1>My Classes</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classrooms as $classroom)
                <tr>
                    <td>{{$classroom->id}}</td>
                    <td>{{$classroom->name}}</td>
                    <td><a href="{{ route('classrooms.show', $classroom->id)}}">{{ $classroom->name}} </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @can('isStudent')
        <a href="{{ route('classrooms.show', $user->classroom_id)}}">My Class Posts >>> Click Here{{ $user->classroom_id}} </a>
        @endcan
    </div>
    <div class="col-md-4">

    </div>
</div>
@endsection