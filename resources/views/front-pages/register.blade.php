@extends('front-layouts/master')

@section('title' , 'Register')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
          <h1 class="mb-3">Thank you for choosing <br>
            <span class="fw-bold">Atlas Tuition Center!</span> 
          </h1>
          <h4>
            We are so excited to have you join our community of learners. At Atlas, we believe that every student has the potential to succeed, and it is our mission to help you reach your full potential. Our team of experienced educators is dedicated to providing high-quality, personalized instruction to help you succeed in your academic journey.
            <br> <br>
            We can't wait to see what you will achieve with us at Atlas Tuition Center. Thank you for choosing us as your learning partner. Let's get started on your journey to academic success today!
          </h4>
        </div>
        <div class="col-lg-6 order-2 order-lg-2">
            <div class="card shadow p-3 mb-5 bg-white rounded border-0">  
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid mx-auto d-block" alt="...">

                    <p class="text-center h4 fw-bold ">Sign up now!</p>
                    <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">Your Name</label>
                            @if ($errors->any())
                              @foreach ($errors->get('name') as $error)
                                <div class="alert alert-danger" role="alert">
                                  {{ $error }}
                                </div>
                              @endforeach
                            @endif
                            <input type="text"  name="name" value="{{old('name')}}"  id="form3Example1c" class="form-control" required autofocus/>
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Your Email</label>
                              @if ($errors->any())
                                @foreach ($errors->get('email') as $error)
                                  <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                  </div>
                                @endforeach
                              @endif                            
                            <input type="email" name="email" value="{{old('email')}}" id="form3Example3c" class="form-control" />
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password</label>
                            @if ($errors->any())
                              @foreach ($errors->get('password') as $error)
                                <div class="alert alert-danger" role="alert">
                                  {{ $error }}
                                </div>
                              @endforeach
                            @endif
                            <input type="password" name="password" id="form3Example4c" class="form-control" />
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                            <input type="password" name="password_confirmation" id="form3Example4cd" class="form-control" />
                        </div>
                      </div>
    
                      <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                          Already have an account ?  <a href="{{route('login')}}">Login here</a>
                        </label>
                      </div>
    
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button class="btn-get-started scrollto">Register account</button>
                      </div>
    
                    </form>
    
            </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  @endsection