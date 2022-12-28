  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">


      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{url('/')}}" class="logo">
        <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" >
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Courses</a></li>
          <li><a class="nav-link scrollto" href="#team">Teacher</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

          @if(Auth::user())
            <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ route('profile')}}">Profile</a></li>
                <li><a href="{{ route('logout')}}">Logout</a></li>
              </ul>
            </li>
            @else
            <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

