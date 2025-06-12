@extends('Frontend.layout.layout')

@section('title', 'Trainers')

@section('content')
    <!--Breadcumb area start here-->
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>Trainer</h2>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="javascript:void(0)">Trainer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->

    <!--Trainers Section-->
    <section class="price-area section bg-img jarallax">
        <div class="container">
            <!-- Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>Trainers</h2>
                        <p>We offer flexible and affordable training packages for every skill level — from first-time gun
                            owners to advanced tactical operators. Explore our most popular trainers:</p>
                    </div>
                </div>
            </div>

            <!-- Providers Grid -->
            <div class="row all-provider">
                @if ($providers->count())
                    @foreach ($providers as $provider)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="provider-card h-100">
                                <!-- Provider Image -->
                                <div class="provider-img-container">
                                    <img src="{{ asset($provider->logo ?? 'assets/images/default-provider.jpg') }}"
                                        alt="{{ $provider->store_name }}" class="img-fluid provider-weapon-img">
                                </div>

                                <!-- Provider Content -->
                                <div class="provider-body">
                                    <h3 class="provider-title">{{ $provider->store_name }}</h3>
                                    <div class="provider-details">
                                        <div class="provider-info">
                                            <div class="provider-name">
                                                <i class="fas fa-user"></i>
                                                <span>{{ $provider->owner_name }}</span>
                                            </div>
                                            {{-- @if ($provider->established_year)
                                                <div class="provider-exp">
                                                    <i class="fas fa-trophy"></i>
                                                    <span>{{ now()->year - $provider->established_year }} Years
                                                        Experience</span>
                                                </div>
                                            @endif --}}
                                        </div>

                                        <div class="provider-contact">
                                            <div class="provider-phone">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $provider->phone_number }}</span>
                                            </div>
                                            <div class="provider-email">
                                                <i class="fas fa-envelope"></i>
                                                <span>{{ $provider->email }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Provider Features -->
                                    <div class="provider-features">
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i> {{ $provider->city }},
                                                {{ $provider->state }}, {{ $provider->country }}</li>
                                            <li><i class="fas fa-globe"></i> <a href="{{ $provider->website }}"
                                                    target="_blank">{{ $provider->website }}</a></li>
                                            <li><i class="fas fa-info-circle"></i>
                                                {{ Str::limit(strip_tags($provider->store_description), 80) }}</li>
                                        </ul>
                                    </div>

                                    <!-- View Services Button -->
                                    <div class="provider-action">
                                        <a href="{{ route('provider.service', $provider->id) }}"
                                            class="btn btn-provider">View Services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No trainers found.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
