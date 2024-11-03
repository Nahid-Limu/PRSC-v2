@extends('layouts.app')

@section('title', 'Result')

@section('content')

<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Result</h2>
        <p>All Academic Results. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          @foreach ($Results as $Result)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <img src="assets/img/demo-result.png" class="img-fluid" alt="...">
                <div class="course-content ">
                  <hr>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{  ucwords($Result->class) }}</h4>
                    <p class="price">{{ ucwords($Result->exam_name) }} <kbd>{{ date('Y', strtotime($Result->created_at)) }}</kbd> </p>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <hr>
                    <p class=""><kbd>Publish Date :</kbd></p>
                    <p class=""><kbd>{{ date('F j, Y', strtotime($Result->created_at)) }}</kbd> </p>
                    <hr>
                  </div>
                  <hr>
                  {{-- <h3><a href="course-details.html">{{ $Result->class }}</a></h3>
                  <p class="text-success" >{{ $Result->exam_name }} <kbd>{{ date('Y', strtotime($Result->created_at)) }}</kbd></p> --}}
                  
                  <div class="btn-wrap d-flex justify-content-center">
                      @php
                          $url= asset('assets/file/result').'/'.$Result->document; 
                      @endphp
                      <a href="{{ $url }}" type="button" class="btn btn-sm btn-outline-success text-center" title=""> <i class='bx bx-download'></i> Download Result</a>
                  </div>
                </div>
                
              </div>
            </div> <!-- End Course Item-->
          @endforeach

        </div>

      </div>
    </section><!-- End Courses Section -->

</main>
<!-- End #main -->

@endsection
