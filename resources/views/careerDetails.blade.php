@extends('layouts.app')

@section('title', 'Career Details')

@section('content')

<!-- start #main -->
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
        <h2>Career</h2>
        <p>Career Details </p>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid" src="{{ asset('assets/img/joinUs-logo.png')}}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">Job Title: {{ ucwords($Career->title) }} </h3>
                            {{-- <span class="text-truncate me-3"><i class="bx bx-map bx-burst text-primary me-2"></i>Panchagarh Residential School And College</span> --}}
                            <span class="text-truncate me-3"><i class="bx bx-time-five bx-spin text-primary me-2"></i>Full Time</span>
                            <span class="text-truncate me-0"><i class="bx bx-dollar bx-tada text-primary me-2"></i>{{ $Career->salary_start }} - {{ $Career->salary_end }} BDT</span>
                            <span class="text-truncate me-3"><i class="bx bx-map bx-burst text-primary me-2"></i>Panchagarh Residential School And College</span>
                        </div>
                    </div>

                    <div class="mb-5">

                        {!! $Career->description !!}

                        <h4 class="mb-3">Contact</h4>
                        <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-envelope bx-tada text-primary me-2"></i>email@gmail.com</li>
                            <li><i class="bx bx-phone bx-tada text-primary me-2"></i>+88 017636150770</li>
                            <li><i class="bx bx-map bx-burst text-primary me-2"></i>Panchagarh Residential School And College,<br>&nbsp&nbsp&nbsp&nbsp&nbsp Tetulia Highway (Uttor Mithapukur) Panchagarh.</li>
                        </ul>
                    </div>
    
                    <!-- Apply For The Job Start -->
                    {{-- <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Portfolio Website">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <!-- Apply For The Job End -->
                </div>
    
                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="bx bx-chevron-right text-primary me-2"></i>Published On: {{ date('j M , Y', strtotime($Career->created_at)) }} </p>
                        <p><i class="bx bx-chevron-right text-primary me-2"></i>Vacancy: {{ $Career->vacancy }} </p>
                        <p><i class="bx bx-chevron-right text-primary me-2"></i>Job Nature: Full Time</p>
                        <p><i class="bx bx-chevron-right text-primary me-2"></i>Salary: {{ $Career->salary_start }} - {{ $Career->salary_end }} BDT </p>
                        {{-- <p><i class="bx bx-chevron-right text-primary me-2"></i>Location: Residential School And College</p> --}}
                        <p class="m-0"><i class="bx bx-chevron-right text-primary me-2"></i>Deadline: {{ date('j M , Y', strtotime($Career->deadline)) }} </p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Institute Detail</h4>
                        <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

</main>
<!-- End #main -->

@endsection
