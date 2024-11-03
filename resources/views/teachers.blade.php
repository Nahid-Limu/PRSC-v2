@extends('layouts.app')

@section('title', 'Teachers')

@section('content')

<!-- start #main -->
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
        <h2>Teachers </h2>
        <p>Our Honorable Teachers. </p>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-1.png" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Fazly Adal</h4>
                            <span><i class='bx bxs-id-card'></i> Principal </span>
                            <p>
                                "A teacher's job is to take a bunch of live wires and see that they are well-grounded."
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}

                @foreach ($Teachers as $Teacher)

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('assets/img/teachers').'/'.$Teacher->image }}" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4> {{ ucwords($Teacher->name) }} </h4>
                                <span><i class='bx bxs-id-card'></i> {{ $Teacher->designation }} </span>
                                <p>
                                    {{ $Teacher->teachers_words }}
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Trainers Section -->

</main>
<!-- End #main -->

@endsection
