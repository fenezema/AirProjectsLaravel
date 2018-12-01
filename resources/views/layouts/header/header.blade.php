  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        @auth
          <h1><a href="{{route('home')}}" class="scrollto">Air<span>Project</span></a></h1>
        @else
          <h1><a href="{{route('landing')}}" class="scrollto">Air<span>Project</span></a></h1>
        @endif
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        @auth
          <li class="menu-has-children">
            <a>Browse Projects</a>
            <ul>
              <li><a href="{{route('home')}}" id="allProjectShow">All Projects</a></li>
              <li >
                <a id="navbarDropdown" role="button">
                    By Category <span class="caret"></span>
                </a>

                <ul id="navbar-dropdownJenis">
                    <!-- <a class="dropdown-item">
                        
                    </a> -->
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="{{route('workers')}}">Find a Worker</a></li>
          <li class="menu-has-children">
            <a>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
            <ul>
              <li><a href="{{route('profile')}}">My Profile</a></li>
              <li><a href="#">My Project</a></li>
              <li class="nav-item dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          <li class="menu-active"><a href="#services">Post a Project</a></li>
        @else
          <li><a href="{{route('login')}}">Sign In</a></li>
          <li><a href="{{route('register')}}">Sign Up</a></li>
          <li class="menu-active"><a href="#services">Post a Project</a></li>
        @endif
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->