@extends('layouts.apps')
@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Client Register</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Client Register</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="container" data-aos="fade-up">
        
        <!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 150px;
          "></div>
    <!-- Background image -->
  
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Client Sign up </h2>
            <form action="client-register" method="POST">
              @csrf
             <!-- 2 column grid layout with text inputs for the first and last names -->
             <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" name="businessname" />
                  <label class="form-label" for="form3Example1">Business Name</label>
                  @error('businessname')<p style="color: red">{{$message}}</p>@enderror
                </div>
              </div>
              
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="financial" id="inlineCheckbox1" value="financial">
                    <label class="form-check-label" for="inlineCheckbox1">Financial</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="financial" value="NGO">
                    <label class="form-check-label" for="inlineCheckbox2">NGO</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="financial" value="wildlife">
                    <label class="form-check-label" for="inlineCheckbox2">Wildlife</label>
                  </div>
                  @error('financial')
                    <p style="color: red">{{$message}}</p>   
                  @enderror
                </div>
                <p>Type of Business</p>
              </div> 
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" name="Agency" />
                  <label class="form-label" for="form3Example1">Agency of Information</label>
                  @error('Agency')<p style="color: red">{{$message}}</p>@enderror
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" name="area" />
                  <label class="form-label" for="form3Example2">Area</label>
                  @error('area')<p style="color: red">{{$message}}</p>@enderror
                </div>
              </div>
            </div>

           
            
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" name="District" />
                  <label class="form-label" for="form3Example1">District</label>
                  @error('district')<p style="color: red">{{$message}}</p>@enderror
                </div>
              </div>
              
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" name="ourdate" placeholder="00-00-00 to 00-00-00" required />
                  <label class="form-label" for="form3Example1">Effective date</label>
                  @error('ourdate')<p style="color: red">{{$message}}</p>@enderror
                </div>
              </div>
            </div>
            
            <div class="col-md-12 mb-4">
              <div class="form-outline">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Analysed_report" name="report">
                  <label class="form-check-label" for="inlineCheckbox1">Analysed Report</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="visualised_statics" name="report">
                  <label class="form-check-label" for="inlineCheckbox2">Visualised statics</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="others" name="report ">
                  <label class="form-check-label" for="inlineCheckbox2">others</label>
                </div>
                @error('etxras[]')<p style="color: red">{{$message}}</p>@enderror
              </div>
              <br>
              <p>Extra Services</p>
            </div> 
          </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Client Sign up
              </button>
  
              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>
  
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>
  
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
  
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
      </div>
    </section>
  </main><!-- End #main -->
  @endsection