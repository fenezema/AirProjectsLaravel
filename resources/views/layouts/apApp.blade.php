<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.header.head')
</head>

<body id="body">
  @auth
  @else
    <!--==========================
      Top Bar
    ============================-->
    @include('layouts.header.topbar')
  @endif
  <!--==========================
    Header
  ============================-->
  @include('layouts.header.header')

  @auth
  @else
    <!--==========================
      Intro Section
    ============================-->
    @include('layouts.header.intro')
  @endif

  <main id="main">
    @auth
      @yield('content')
    @else
      <!--==========================
        About Section
      ============================-->
      @include('layouts.aboutSection')

      <!--==========================
        Our Portfolio Section
      ============================-->
      @include('layouts.portfolio')

      <!--==========================
        Services Section
      ============================-->
      @include('layouts.services')

      <!--==========================
        Contact Section
      ============================-->
      @include('layouts.contact')
    @endif

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