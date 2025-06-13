@extends('Frontend.layout.layout')

@section('title', 'Services')

@section('content')
    <!--Breadcumb area start here-->
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>Provider Services</h2>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="javascript:void(0)">Provider Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->

    <!--Weapons Services Start here-->
    <section class="all-services section bg-img jarallax">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>Provider Services</h2>
                        <p>Explore services offered by this provider:</p>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            @isset($services)
                @if ($services->count())
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                <div class="service-box h-100">
                                    <div class="icon-box">
                                        <img src="{{ asset($service->image ? $service->image : 'assets/images/default-service.jpg') }}"
                                            alt="{{ $service->name }}" class="img-fluid">
                                    </div>
                                    <div class="my-serv-content">
                                        <h3>{{ $service->name }}</h3>
                                        <p>{{ Str::limit(strip_tags($service->description), 100) }}</p>
                                        <ul class="features">
                                            <li>Price: ${{ number_format($service->price, 2) }}</li>
                                            <li>Type: {{ ucfirst($service->type) }}</li>
                                            <li>Status: {{ ucfirst($service->status) }}</li>
                                        </ul>
                                        <a href="{{ route('booking-details', $service->id) }}" class="btn1">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center mt-4">
                        <p>No services available for this provider.</p>
                    </div>
                @endif
            @endisset
        </div>
    </section>
    <!--Weapons Services End here-->

@endsection
