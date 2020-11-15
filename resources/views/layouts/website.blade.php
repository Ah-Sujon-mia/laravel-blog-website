 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel Blog Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/website/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/website/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('public/website/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('public/website/css/style.css')}}">
  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="{{ url('/') }}" class="text-black h2 mb-0"><img style="width: 50px; height: 50px;" src="{{ asset('public/website/images/logo/'.$Setting->logo) }}" alt=""></a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>


@yield('content')


    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <div>
              {!! $Setting->description !!}
            </div>
          </div>
          
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            {{-- <ul class="list-unstyled float-left mr-5">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Subscribes</a></li>
            </ul>
            <ul class="list-unstyled float-left">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Nature</a></li>
            </ul> --}}
          </div>

          <div class="col-md-4">
            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a href="{{ $Setting->facebook }}" target="_blank"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="{{ $Setting->twitter }}" target="_blank"><span class="icon-twitter p-2"></span></a>
                <a href="{{ $Setting->linkedin }}" target="_blank"><span class="icon-linkedin p-2"></span></a>
                <a href="mailto:{{ $Setting->email }}"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              {!! $Setting->copyright !!}
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="{{asset('public/website/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('public/website/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('public/website/js/jquery-ui.js')}}"></script>
  <script src="{{asset('public/website/js/popper.min.js')}}"></script>

  <script src="{{asset('public/website/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/website/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/website/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('public/website/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('public/website/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('public/website/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('public/website/js/aos.js')}}"></script>
  <script src="{{asset('public/website/js/main.js')}}"></script>
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f7af83bae5c1825"></script>

  @stack('comment')

  </body>
</html>
