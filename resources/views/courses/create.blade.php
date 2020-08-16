@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ route('users.store'}}" method="POST">
            <div class="form-group">
                <label for="classcode">Enter classcode</label>
                <input type="text" name="classcode" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Join</button>
        </form>
    </div>
</div>
@endsection