@extends('layouts.main')
@section('title', '|Contact Us')
@section('content')
    

          <div class="row">
              <div class="col-md-8 offset-2">
                  <h1 class="titles">Contact Us</h1>
                  <hr>
              <form action="{{ url('contactus') }}" method="POST">
                @csrf
                      <div class="form-group">
                          <label name="email">Email:</label>
                          <input name="email" type="email" id="email" class="form-control" placeholder="example@email.com">
                      </div>
                      <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input name="subject" type="text" id="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea name="message" id="message" class="form-control" cols="40" rows="10" placeholder="Type Your Message Here..."></textarea>
                    </div>
                    <input type="submit" value="Send Message" class="btn btn-success">
                  </form>
             </div>
          </div>
@endsection     