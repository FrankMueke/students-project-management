@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-2 offset-5 mt-3">
            <h1 class="text-center heading">
              <svg class="bi bi-file-richtext" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
              <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 9h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208zM6.25 5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
            </svg>
        
            <hr>
          </div>
        <div class="col-md-10 offset-1">
            
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Reg No.</th>
                    <th>Proposal</th>
                    <th>Progress /35</th>
                    <th>Final /65</th>
                    <th>Total score /100</th>
                    <th>Grade score</th>
                </thead> 
    
                <tbody>
                @if(count($grades) > 0)
                    @foreach($grades as $grade)
    
                    <tr>
                        <th>{{ $grade->id }}</th>
                        <td>{{ $grade->user->name }}</td>
                        <td>{{ $grade->user->regno }}</td>
                        <td>{{ $grade->proposal}}</td>
                        <td>{{$grade->progress}}</td>
                        <td>{{$grade->final}}</td>
                        <td>{{$grade->total}}</td>
                        <td>{{$grade->agp}}</td>
                    </tr>
                    @endforeach
                    @else
                                <h1> No grades yet</h1>
                    @endif
                </tbody>
            </table>

        </div>
     
    </div>
</div>
@endsection 