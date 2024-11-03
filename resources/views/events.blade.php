@extends('layouts.app')

@section('title', 'Events')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
        <h2>Events</h2>
        <p>Panchagarh Residential School And College is full of various Events. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container" data-aos="fade-up">

        <div class="row">
            @php
                $date_now = date("Y-m-d");
            @endphp
            <hr>
            <marquee direction="right" ><h6 class="text-center text-success">Up Comming Event</h6></marquee>
            <hr>
            @foreach ($Events as $Event)
                @if ($date_now < $Event->event_date )
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-img">
                            <img src="{{ asset('assets/img/events').'/'.$Event->image }}" alt="...">
                            </div>
                            <div class="card-body">
                            <h5 class="card-title"><a href="">{{  ucwords($Event->title) }}</a></h5>
                            <p class="fst-italic text-center">{{ date('l, F jS, Y', strtotime($Event->event_date)) }} at {{ date('h:i A', strtotime($Event->event_time)) }}</p>
                            <p class="card-text">{{ $Event->description }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <hr>
            <marquee direction="right" ><h6 class="text-center text-danger">Old Event</h6></marquee>
            <hr>
            @foreach ($Events as $Event)
                @if ($date_now > $Event->event_date )
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-img">
                            <img src="{{ asset('assets/img/events').'/'.$Event->image }}" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">{{ $Event->title }}</a></h5>
                                <p class="fst-italic text-center">{{ date('l, F jS, Y', strtotime($Event->event_date)) }} at {{ date('h:i A', strtotime($Event->event_time)) }}</p>
                                <p class="card-text">{{ $Event->description }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <hr>
            <marquee direction="right" ><h6 class="text-center text-success">Up Comming Event</h6></marquee>
            <hr>
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-img">
                    <img src="assets/img/events-1.jpg" alt="...">
                    </div>
                    <div class="card-body">
                    <h5 class="card-title"><a href="">Introduction to webdesign</a></h5>
                    <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                    </div>
                </div>
            </div>

            <hr>
            <h6 class="text-center text-danger">Old Event</h6>
            <hr>
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-img">
                    <img src="assets/img/events-2.jpg" alt="...">
                    </div>
                    <div class="card-body">
                    <h5 class="card-title"><a href="">Marketing Strategies</a></h5>
                    <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
                    <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
                    </div>
                </div>

            </div> --}}
            
        </div>

        </div>
    </section><!-- End Events Section -->

</main>
<!-- End #main -->

@endsection
