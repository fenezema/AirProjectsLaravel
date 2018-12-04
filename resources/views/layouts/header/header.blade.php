  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        @auth
          <h1><a href="{{route('home')}}" class="scrollto"><img src="apFront/img/logo.png" alt="" style="height: 50px;" class="img-fluid">Air<span>Project</span></a></h1>
        @else
          <h1><a href="{{route('landing')}}" class="scrollto"><img src="apFront/img/logo.png" alt="" style="height: 50px;" class="img-fluid">Air<span>Project</span></a></h1>
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
              @if(Auth::user()->role=="po")
              <li><a href="{{route('myProjects')}}">My Project</a></li>
              @elseif(Auth::user()->role=="worker")
              <li><a href="{{route('workerProjects')}}">My Project</a></li>
              @endif
              @if(Auth::user()->role=="po")
              <li><a href="{{route('myRequest')}}">Requests</a></li>
              @endif
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
          @if(Auth::user()->role=="po")
            <li class="menu-active"><a href="{{route('newProject')}}">Post a Project</a></li>
          @endif
        @else
          <li><a href="{{route('login')}}">Sign In</a></li>
          <li><a href="{{route('register')}}">Sign Up</a></li>
          <li class="menu-active"><a href="#services">Post a Project</a></li>
        @endif
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->