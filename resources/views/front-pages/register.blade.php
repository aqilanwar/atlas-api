@extends('front-layouts/master')

@section('title' , 'Login')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Selamat datang ke <br>
            <span class="fw-bold">Atlas Tuition Center!</span> 
          </h1>
          <h4>
            Adakah anda mencari cara yang boleh dipercayai dan berkesan untuk meningkatkan prestasi akademik anda? 
            Jangan risau lagi! 
            <br> <br>
            Di Atlas Tuition Center, kami menyediakan perkhidmatan tuisyen yang disesuaikan dan komprehensif untuk pelajar semua peringkat dan umur.
          </h4>
          <div class="mt-3">
            <a href="#about" class="btn-get-started scrollto">Daftar Sekarang</a>
            <a href="" class="btn-get-quote">Lihat subjek yang ditawarkan</a>
          </div>
        </div>
        <div class="col-lg-6 order-2 order-lg-2">
            <div class="card shadow p-3 mb-5 bg-white rounded border-0">  
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid mx-auto d-block" alt="...">

                    <p class="text-center h4 fw-bold ">Sign up now!</p>
                    <form class="mx-1 mx-md-4">
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">Your Name</label>
                            <input type="text" id="form3Example1c" class="form-control" />
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Your Email</label>
                            <input type="email" id="form3Example3c" class="form-control" />
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password</label>
                            <input type="password" id="form3Example4c" class="form-control" />
                        </div>
                      </div>
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                            <input type="password" id="form3Example4cd" class="form-control" />
                        </div>
                      </div>
    
                      <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                          Already have an account ?  <a href="#!">Login here</a>
                        </label>
                      </div>
    
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button href="#about" class="btn-get-started scrollto">Register account</button>
                    </div>
    
                    </form>
    
            </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  @endsection