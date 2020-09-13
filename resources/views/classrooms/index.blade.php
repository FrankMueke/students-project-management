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
                    <td><input type="text" value="{{ $classroom->classcode}}" id="classcode"></td>
                    <td><button onclick="copyText()">Copy</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">

    </div>
</div>
@endsection