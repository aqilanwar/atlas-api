@extends('front-layouts/master')

@section('title' , 'Email Confirmation')
@section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="col d-flex justify-content-center">
        <div class="card " style="max-width: 35rem;">
          <div class="card-body text-center" style="padding:30px">
            <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" >
            <h1>Thank you for registering to <br>
              <span class="fw-bold">Atlas Tuition Center!</span> 
            </h1>
            <br>
            <h5>
              Please check your email to verify your account!
            </h5>
                
            <div class="d-flex justify-content-center mx-4 mt-4 mb-3 mb-lg-4">
              <a href="{{route('login')}}" class="btn-get-started scrollto">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>


@endsection
