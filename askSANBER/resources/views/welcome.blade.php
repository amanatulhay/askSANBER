@extends('layouts.master')

@section('judul1')
WELCOME TO OUR PAGE
@endsection

@section('judul2')
DASHBOARD
@endsection

@push('styles')
 <!-- Favicons -->
 <link href="{{ asset('template2/img/favicon.png') }}" rel="icon">
 <link href="{{ asset('template2/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

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
@endpush
@push('scripts')
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
@endpush


@section('content')
    <section id="about">
        <div class="container">
  
          <header class="section-header">
            <h3>Explore Our Forum</h3>
          </header>
  
          <div class="row about-cols">
  
            <div class="col-md-4 wow fadeInUp">
              <div class="about-col">
                <div class="img">
                  <img src="{{ asset('template2/img/about-plan.jpg') }}" alt="" class="img-fluid">
                  <div class="icon"><i class="ion-ios-list-outline"></i></div>
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
@endsection

