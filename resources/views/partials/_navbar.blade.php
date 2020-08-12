<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">
    <img src= "{{ asset('images/logo2.png') }}" height="10" alt="Logo here">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
          <a class="nav-link" href="/"><b>Home</b></a>
          <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
          <a class="nav-link" href="/aboutus"><b>About</b></a>
        </li>
        <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
          <a class="nav-link" href="/contactus"><b>Contact</b></a>
        </li>
        </li>
      </ul>
    @if (Auth::check())
      <ul class="nav-item dropdown">
        <img src="uploads/avatars/{{ Auth::user()->avatar}}" class="avatarnav" alt="avatar here">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Hello {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('posts.index') }}">All Posts</a>
          <a class="dropdown-item" href="{{ route('register') }}">Register user</a>
          <a class="dropdown-item" href="{{ route('courses.index') }}">My Courses</a>
          <a class="dropdown-item" href="{{ route('users.edit', Auth::id())}}">Update Profile</a>
          
        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </div>
      </ul>
      @else
      <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
    @endif
    </div>
  </nav>