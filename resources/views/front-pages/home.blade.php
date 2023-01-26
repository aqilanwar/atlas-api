@extends('front-layouts/master')

@section('title' , 'Home')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Welcome to <br>
            <span class="fw-bold">Atlas Tuition Center!</span> 
          </h1>
          <br>
          <h4>
            Are you looking for a reliable and effective way to improve your academic performance? 
            <br> <br>
            At Atlas Tuition Center, we provide customized and comprehensive tuition services for students.
          </h4>
          <div class="mt-3">
            <a href="{{route('register')}}" class="btn-get-started">Register now !</a>
            <a href="#services" class="btn-get-quote scrollto">View offered subjects</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="https://images.pexels.com/photos/8500340/pexels-photo-8500340.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-fluid rounded" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>
            Our highly qualified and experienced team of educators will work with you to identify your strengths and weaknesses, and provide a learning plan tailored to your needs and goals.
          </h2>
          <p> Whether you need help in a specific subject or want to improve your overall grades, we have the expertise and resources to support you.</p>
        </div>
      </div>
    </section><!-- End Team Section -->

    @include('front-pages/courses')

  </main><!-- End #main -->
  @endsection