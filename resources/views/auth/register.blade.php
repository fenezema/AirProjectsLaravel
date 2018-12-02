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
                    <h5 style="font-weight: bold;">Lets Join Us</h5>
                      <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-group" style="margin-top: 2em;margin-bottom: 1em;">
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email" placeholder="Email Address">
                          @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="form-group" style="margin-top: 2em;margin-bottom: 1em;">
                          <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" id="username" name="username" placeholder="Username">
                          @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="form-group" style="margin-top: 2em;margin-bottom: 1em;">
                          <input id="firstname" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="firstname" placeholder="First Name">
                          @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="form-group" style="margin-top: 2em;margin-bottom: 1em;">
                          <input id="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" type="text" name="lastname" placeholder="Last Name">
                          @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
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
                        <div class="form-group" style="margin-top: 1em;margin-bottom: 1em;">
                          <input id="password-confirm" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                          
                        </div>
                        <div class="form-group" style="margin-top: 1em;margin-bottom: 2em;">
                          <button type="submit" class="form-control btn btn-primary">Sign Up</button>
                        </div>
                      </form>
                      <p>By registering you confirm that you accept the <a href="">User Agreement</a></p>
                      <hr>
                      <p>Already have an account? <a href="{{route('login')}}">Sign In</a></p>
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