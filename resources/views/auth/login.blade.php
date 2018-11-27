<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.header.head')
</head>

<body id="body">
  <main id="main" style="background-color: #d3d3d3;">
    <div class="container text-center" style="margin-top: 3%;margin-bottom: 2.7%;">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div id="header">
                <div id="logo">
                  <h1><a href="{{route('landing')}}">Air<span>Project</span></a></h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div style="margin-top: 3em;margin-bottom: 3em;">
                    <h5 style="font-weight: bold;">Welcome Back</h5>
                    <form method="POST" action="{{route('login')}}">
                    @csrf
                      <div class="form-group" style="margin-top: 2em;margin-bottom: 1em;">
                        <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" name="username" placeholder="Username">
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                        <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group" style="margin-top: 1em;margin-bottom: 2em;">
                        <button type="submit" class="form-control btn btn-primary">Sign In</button>
                      </div>
                      <hr>
                      <p>Dont have an account? <a href="{{route('register')}}">Sign Up</a></p>
                      </form>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

  </main>

  <!--==========================
    Footer
  ============================-->
  @include('layouts.footer.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  @include('scripts.jslibs')
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="{{asset('apFront/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  @include('scripts.scripts')

</body>
</html>