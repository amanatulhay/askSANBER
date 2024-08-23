<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>askSANBER!</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('template2/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template2/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700') }}" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('template2/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('template2/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template2/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template2/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template2/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('template2/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">askSANBER!</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">Home</a></li>
          <li class="menu-active"><a href="/welcome">Dashboard</a></li>
          <li><a href="/kategori">Categories</a></li>
          <li><a href="/pertanyaan">Forum</a></li>
          @auth
            <a href="{{ route('logout') }}" class="nav-link bg-danger" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">             
              Log out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>  
          @endauth
          @guest
            <li><a href="/login">Log In</a></li>
          @endguest
          <li><a href="/register">Register</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('template2/img/intro-carousel/1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Ask anything</h2>
                <p>There is no such thing as a dumb question. Go ask anything computer programming-related</p>
                <a href="/pertanyaan/create" class="btn-get-started scrollto">Ask Your Question</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('template2/img/intro-carousel/2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Join to Discussion</h2>
                <p>"Alone, we can do so little; together, we can do so much". Join people to share the best solution to the problem. Help other with your knowledge and maybe you will learn something too </p>
                <a href="/pertanyaan" class="btn-get-started scrollto">Post Your Answer in The Discussion</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('template2/img/intro-carousel/3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Wide number of Categories</h2>
                <p>Filter your searching and explore your current interest</p>
                <a href="/kategori" class="btn-get-started scrollto">Browse by Category</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Explore Our Forum</h3>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('template2/img/about-mission.jpg') }}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="/">Most Recent Question</a></h2>
                <div class="card">
                  <div class="card-body">
                      @if (isset($pertanyaan->id))
                        <h5 class="text-primary">{{$pertanyaan->title}}</h5>
                        <span class="badge badge-info">Category: {{$pertanyaan->kategori->name}}</span>
                        <p class="card-text">{!!Str::limit($pertanyaan->content, 100)!!}</p>
                        <img src="{{asset('image/'.$pertanyaan->image)}}" class="card-img-top" alt="">
                        <p>Asked by: {{$pertanyaan->user->name}}</p>
                        <a href="/pertanyaan/{{$pertanyaan->id}}" class="btn btn-primary btn-block btn-sm">Check Out The Question</a>
                      @else
                        No Question Data
                      @endif
                    </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('template2/img/about-plan.jpg') }}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="/">Most Recent Answer</a></h2>
                <div class="card">
                  <div class="card-body">    
                    @if (isset($jawaban->id))
                       <span class="badge badge-info">Category: {{$jawaban->pertanyaan->kategori->name}}</span>
                       <p class="card-text">{!!Str::limit($jawaban["content"], 400)!!}</p>
                       <img src="{{asset('image/'.$jawaban->image)}}" class="card-img-top" alt="">
                       <p>Posted by: {{$jawaban->user->name}}</p>
                       <a href="/pertanyaan/{{$jawaban->pertanyaan->id}}" class="btn btn-primary btn-block btn-sm">Go to the Discussion</a>
                    @else
                       No Answer Data
                    @endif
                    </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset('template2/img/about-vision.jpg') }}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="/">Add Your Question!</a></h2>
                <div class="card">
                  <div class="card-body">
                <a href="/pertanyaan/create" class="btn btn-primary btn-block btn-sm">Add Your Question</a>
              </div>
            </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>askSANBER!</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('template2/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template2/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('template2/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template2/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('template2/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('template2/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('template2/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('template2/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('template2/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('template2/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('template2/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template2/lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('template2/lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('template2/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('template2/js/main.js') }}"></script>

</body>
</html>
