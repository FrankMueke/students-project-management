<div class="content">
   <div class="title m-b-md">
       Video Chat Rooms
   </div>

<div class="row">
    <div class="col md-8">
    <form action="{{ 'url' => 'room/create' }}" method="post">
            @csrf 
            <h1>Create or join conference</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="roomName" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
    </form>
    @if($rooms)
   @foreach ($rooms as $room)
       <a href="{{ url('/room/join/'.$room) }}">{{ $room }}</a>
   @endforeach
   @endif
    </div>
</div>

  
