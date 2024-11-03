<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="{{ route('home') }}">PRSC</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      {{-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.jpg" alt="" class="img-fluid"></a> --}}

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="{{ (Route::currentRouteName() == 'home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
          <li><a class="{{ (Route::currentRouteName() == 'teachers') ? 'active' : '' }}" href="{{ route('teachers') }}">Our Teachers</a></li>
          <li><a class="{{ (Route::currentRouteName() == 'events') ? 'active' : '' }}" href="{{ route('events') }}">Events</a></li>
          <li><a class="{{ (Route::currentRouteName() == 'notice') || (Route::currentRouteName() == 'noticeDetails') ? 'active' : '' }}" href="{{ route('notice') }}">Notice</a></li>
          <li><a class="{{ (Route::currentRouteName() == 'result') ? 'active' : '' }}" href="{{ route('result') }}">Result</a></li>
          <li><a class="{{ (Route::currentRouteName() == 'admission') ? 'active' : '' }}" href="{{ route('admission') }}">Admission</a></li>
          <li><a class="{{ (Route::currentRouteName() == 'career') || (Route::currentRouteName() == 'careerDetails') ? 'active' : '' }}" href="{{ route('career') }}">Career</a></li>
          {{-- <li><a href="courses.html">Courses</a></li> --}}
          
          
          
          <li><a class="{{ (Route::currentRouteName() == 'about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
          {{-- <li><a class="{{ (Route::currentRouteName() == 'career') ? 'active' : '' }}" href="{{ route('career') }}">career</a></li> --}}
          {{-- <li><a href="pricing.html">Pricing</a></li> --}}
          {{-- <li><a href="{{ route('testPage') }}">testPage</a></li> --}}

          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="{{ (Route::currentRouteName() == 'contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('login') }}" class="get-started-btn">Log In</a>

    </div>
  </header>
  <!-- End Header -->