@extends('auth.layout')

@section('container')
    <body>
      <main>
        <div class="container">
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

                  {{-- logo --}}
                  <div class="d-flex justify-content-center py-4">
                    <a href="/" class="logo d-flex align-items-center w-auto">
                      <img src="{{ asset("assets/img/logo-1.png" ) }}"alt="">
                      <span class="d-none d-lg-block">Havmate</span>
                    </a>
                  </div><!-- End Logo -->
    
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                        <p class="text-center small">Enter your personal details to create account</p>
                      </div>
    
                      <form class="row g-3 needs-validation" method="post" action="/auth/regist">
                        @csrf
                       
                        <div class="col-6">
                          <label for="yourUsername" class="form-label">Username</label>
                          <input type="text" name="username" class="form-control" id="yourUsername" required>
                        </div>

                        <div class="col-6">
                          <label for="yourEmail" class="form-label">Your Email</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Please enter the valid email address.</div>
                          </div>
                        </div>
    
                        <div class="col-6">
                          <label for="yourPassword" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Please enter your password!</div>
                        </div>

                        <div class="col-6">
                          <label for="yourPhone" class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" id="yourPhone" required>
                          <div class="invalid-feedback">Please enter your phone number!</div>
                        </div>

                        <div class="col-12">
                          <label for="yourAddress" class="form-label">Address</label>
                          <input type="text" name="address" class="form-control" id="yourAddress" required>
                          <div class="invalid-feedback">Please enter your address!</div>
                        </div>

                        <div class="row mt-3">
                          <label class="col-form-label">Regist as</label>
                          <div class="col-sm-6" name="role">
                            <select class="form-select" name= "role" aria-label="Default select example">
                              <option selected>Open this select menu</option>
                              <option name="Farmer" value="Farmer" >Farmer</option>
                              <option name="Distributor" value="Distributor" >Distributor</option>
                            </select>
                          </div>                                            
                              <div class="invalid-feedback">Please choose your role!</div>
                        </div>
                        <br>
                       
                        <div class="col-12"><br>
                          <button class="btn-regist btn-primary w-50 position-relative top-99 start-50 translate-middle" type="submit">Create Account</button>
                        </div>
                        <br>
                        <div class="col-12">
                          <p class="small mb-0"><a href="/login">Forgot password?</a></p>
                          
                          <p class="small mb-1">Already have an account? <a href="/auth/login">Log in</a></p>
                        </div>
                      </form>
    
                    </div>
                  </div>
                </div>
                
              </div>
            </div>  
            </div>
          </section>
        
        </div>
      </main><!-- End #main -->
    </body>
@endsection
  
    