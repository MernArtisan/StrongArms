@extends('frontend.layout.layout')
@section('title', 'Services')
@section('content')
<style>
    .text-dark{
        background-color: #111111 !important;
    }

    .pagination .page-link {
        background-color: #111;
        color: #fff;
        border: 1px solid #444;
        margin: 0 3px;
        border-radius: 5px;
    }

    .pagination .page-link:hover {
        background-color: #333;
        color: #fff;
    }

    .pagination .active .page-link {
        background-color: #878244;
        color: #fff;
        border-color: #878244;
    }

    .pagination .disabled .page-link {
        color: #888;
        background-color: #222;
        border-color: #444;
    }

</style>
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Our Services</h2>
                        
                        <ul>
                            <li><a href="\">Home</a></li>
                            <li><a href="javascript:void(0)">Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcumb area end here-->
<!--Price area Start here-->
<section class="price-area section bg-img jarallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-heading">
                    <h2>Trainning Pricing</h2>
                    <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                </div>
            </div>
        </div>
        @foreach ($services as $service)

        <div class="container mb-5">
            <div class="card text-white bg-dark shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="row no-gutters">
                    <!-- Card Image -->
                    <div class="col-md-5">
                        <img src="{{ asset($service->image) }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="Car Image">
                    </div>
        
                    <!-- Card Content -->
                    <div class="col-md-7 d-flex flex-column justify-content-between p-4">
                        <div>
                            <h3 class="card-title">{{ $service->name }}</h3>
                            {{-- <h3 class="card-title">{{ $service->user->name }}</h3> --}}
                            <p class="card-text">{{ $service->description }}</p>
                            <p class="text-muted mb-1">Last updated {{ $service->updated_at->diffForHumans()}} </p>
                            <h4 class="text-warning mt-3">$ {{ $service->price }}</h4>
                            <img src="{{ asset($service->user->image) }}" class="img-fluid" style="object-fit: cover;width: 40px;height: 40px;border-radius: 40%;" alt="Car Image"> {{ $service->user->name }}
                           
                        </div>
                        <div class="text-end">
                            <a href="#" class="btn btn-success btn-lg mt-3">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
        @endforeach

        @if ($services->lastPage() > 1)
        <div class="custom-pagination text-center mt-4">
            <ul class="pagination" style="justify-content: right !important;">
                <li class="page-item {{ $services->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $services->previousPageUrl() }}" aria-label="Previous">
                        &laquo;
                    </a>
                </li>

                @for ($i = 1; $i <= $services->lastPage(); $i++)
                    <li class="page-item {{ $services->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $services->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item {{ !$services->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $services->nextPageUrl() }}" aria-label="Next">
                        &raquo;
                    </a>
                </li>
            </ul>
        </div>
    @endif
    </div>
</section>
<!--Price area End here-->
<!--Trainning area Start here-->
<section class="training-area section bg-img jarallax af">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="training-forms">
                    <form>
                        <fieldset>
                            <input type="text" placeholder="Full Name">
                        </fieldset>
                        <fieldset>
                            <input type="email" placeholder="Email Address">
                        </fieldset>
                        <fieldset>
                            <input type="text" placeholder="Phone No.">
                        </fieldset>
                        <fieldset>
                            <select>
                                <option>Weapon / Plans</option>
                                <option>Weapon / Plans</option>
                                <option>Weapon / Plans</option>
                                <option>Weapon / Plans</option>
                            </select>
                        </fieldset>
                        <fieldset class="arrows ">
                            <div class="row">
                                <div class="col-md-5 col-sm-12 pd-0">
                                    <select>
                                        <option>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-7 col-sm-12 pd-r0">
                                    <input type="number" placeholder="Age">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <textarea placeholder="Message"></textarea>
                        </fieldset>
                        <button type="submit" class="btn1">Send Now</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="training-con pd-t60">
                    <h2>Weapon Trainings</h2>
                    <p>With state-of-the-art indoor training facilities and full service custom shop on lion, we can accommodate most requests.</p>
                    <h1>P. +880 451 455</h1>
                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem is bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh idlit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.</p>
                    <ul>
                        <li><i class="fas fa-long-arrow-alt-right"></i>Trainning x2 Hand Gun Full Pack</li>
                        <li><i class="fas fa-long-arrow-alt-right"></i>Machine Gun CS5 4141 Full Pack </li>
                        <li><i class="fas fa-long-arrow-alt-right"></i>Custom Shooting Range For Trainning</li>
                        <li><i class="fas fa-long-arrow-alt-right"></i>Outfitters hunting and tactical shooting</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Trainning area End here-->
<!--Partner area start here-->
<section class="partner-area section bg-img jarallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-heading">
                    <h2>Our Trusted Partners</h2>
                    <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="partner-list">
                    <ul>
                        <li>
                            <a href="#"><img src="assets/images/client/1.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/2.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/3.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/4.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/5.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/6.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/7.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/8.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/9.png" alt="" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="assets/images/client/10.png" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection