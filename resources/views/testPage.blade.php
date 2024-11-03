@extends('layouts.app')

@section('title', 'testPage')

@section('content')

<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Test Page</h2>
        <p>All Academic Results. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/demo-result.png" class="img-fluid" alt="...">
              <div class="course-content">
                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Class 5</h4>
                  <p class="price">2nd Terminal Exam 2023 </p>
                </div> --}}

                <h3><a href="course-details.html">Class 5</a></h3>
                <p>2nd Terminal Exam 2023.</p>
                
                <div class="btn-wrap">
                    <a href="#" class="btn btn-sm btn-success">Download Result</a>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/demo-result.png" class="img-fluid" alt="...">
              <div class="course-content">
                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Class 5</h4>
                  <p class="price">2nd Terminal Exam 2023 </p>
                </div> --}}

                <h3><a href="course-details.html">Class 5</a></h3>
                <p>2nd Terminal Exam 2023.</p>
                
                <div class="btn-wrap">
                    <a href="#" class="btn btn-sm btn-success">Download Result</a>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/demo-result.png" class="img-fluid" alt="...">
              <div class="course-content">
                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Class 5</h4>
                  <p class="price">2nd Terminal Exam 2023 </p>
                </div> --}}

                <h3><a href="course-details.html">Class 5</a></h3>
                <p>2nd Terminal Exam 2023.</p>
                
                <div class="btn-wrap">
                    <a href="#" class="btn btn-sm btn-success">Download Result</a>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Courses Section -->

</main>
<!-- End #main -->

@endsection
