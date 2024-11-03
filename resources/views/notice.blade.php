@extends('layouts.app')

@section('title', 'Notice')

@section('content')

<!-- start #main -->
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
        <h2>Notice</h2>
        <p>Notice Board</p>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- notice -->
    <section class="section">
        <div class="container">
        <div class="row">
            <div class="col-12">
            <ul class="list-unstyled">
                <!-- notice item -->
                @foreach ($Notices as $Notice)
                    <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                        <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0" style="width: 120px; height: 100px;"><span class="h2 d-block">{{ date('j', strtotime($Notice->pulish_date)) }}</span> {{ date('M Y', strtotime($Notice->pulish_date)) }}</div>
                        <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                            <a href="{{ route('noticeDetails', [base64_encode($Notice->id)] ) }}" class="h4 mb-3 d-block">{{ ucwords($Notice->title) }}</a>
                            <p class="mb-0">{!! Str::limit( strip_tags($Notice->description, 50) ) !!}</p>
                        </div>
                        <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="{{ route('noticeDetails', [base64_encode($Notice->id)] ) }}" class="btn btn-sm btn-outline-primary  me-md-2"> <i class='bx bx-book-reader'></i> read more</a></div>
                    </li>
                @endforeach
                {{-- <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                    <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span class="h2 d-block">30</span> APR,2019</div>
                    <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                        <a href="" class="h4 mb-3 d-block">Teaching Materials and Testing Methods</a>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt perferendis saepe omnis officia! Doloribus quae maiores laboriosam praesentium enim fugiat ipsam laudantium assumenda!</p>
                    </div>
                    <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="" class="btn btn-primary">read more</a></div>
                </li> --}}
                
            </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- /notice -->

</main>
<!-- End #main -->

@endsection
