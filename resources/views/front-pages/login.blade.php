@extends('front-layouts/master')

@section('title' , 'Email Confirmation')
@section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="col d-flex justify-content-center">
          <div class="card shadow p-3 mb-5 bg-white rounded border-0">  
            <img src="{{asset('assets/img/logo.png')}}" class="img-fluid mx-auto d-block" alt="...">

                <p class="text-center h4 fw-bold ">Login</p>
                <form class="mx-1 mx-md-4" method="POST" action="{{ route('login') }}">
                  @csrf
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

                  <div class="d-flex justify-content-center">
                    <p>
                      Don't have an account ?  <a href="{{ route('register') }}">Register here</a>
                    </p>
                  </div>
                  <div class="d-flex justify-content-center mb-3">
    
                    <p>
                      Forgot your password ?  <a href="{{ route('password.request') }}">Click here</a>
                    </p>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn-get-started scrollto">Login</button>
                  </div>
                </div>

                </form>

        </div>
      </div>
    </div>

  </section>


@endsection
