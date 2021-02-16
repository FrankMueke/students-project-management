<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">
    <img src= "{{ asset('images/spmlogo.jpg') }}" height="40" alt="SPM logo">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
          <a class="nav-link" href="/"><b><img src="https://img.icons8.com/fluent/24/000000/home-page.png"/>Home</b></a>
          <li class="nav-item {{ Request::is('classrooms') ? "active" : "" }}">
            <a class="nav-link" href="/classrooms"><b><img src="https://img.icons8.com/doodle/24/000000/google-classroom.png"/>My classes</b></a>
          <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
          <a class="nav-link" href="/aboutus"><b><img src="https://img.icons8.com/android/24/000000/about.png"/>About</b></a>
        </li>
        <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
          <a class="nav-link" href="/contactus"><b><img src="https://img.icons8.com/ultraviolet/24/000000/new-contact.png"/>Contact</b></a>
        </li>
        </li>
      </ul>
    @if (Auth::check())
      <ul class="nav-item dropdown">
        <img src="uploads/avatars/{{ Auth::user()->avatar}}" class="avatarnav" alt="">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Hello {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('users.author', Auth::id())}}">My Posts</a>
          @can('isAdmin')
          <a class="dropdown-item" href="{{ route('posts.index') }}">All Posts</a>
          <a class="dropdown-item" href="{{ route('users.create') }}">Register SuperUser</a>
          <a class="dropdown-item" href="{{ route('students.create') }}">Create Student</a>
          @endcan
          @cannot('isStudent')
          <a class="dropdown-item" href="{{ route('courses.index') }}">My Courses</a>
          @endcannot
          @can('isSupervisor')
          <a class="dropdown-item" href="{{ route('users.index')}}"> My students</a>
          <a class="dropdown-item" href="{{ route('grades.create')}}"> Grade students</a>
          @endcan
          <a class="dropdown-item" href="{{ route('users.edit', Auth::id())}}">Update Profile</a>
          <a class="dropdown-item" href="{{ route('messages.index') }}">Messages</a>
          <a class="dropdown-item" href="{{ route('grades.index') }}">Grades</a>
          
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