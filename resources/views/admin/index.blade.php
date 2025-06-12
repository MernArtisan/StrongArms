@extends('admin.layout.layout')
@section('title', 'admin')
@section('content')

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="row">

                        {{-- Customers (Admin only) --}}
                        @if ($isAdmin)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/1.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Customers</h6>
                                                    <h4 class="text-right"><span>{{ $users }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($isAdmin)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/1.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Providers</h6>
                                                    <h4 class="text-right"><span>{{ $providers }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Orders Received (Admin only) --}}
                        @if ($isAdmin)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/2.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Orders Received</h6>
                                                    <h4 class="text-right"><span>{{ $orders }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Bookings (Admin sees all, Provider sees their own) --}}
                        @if ($isAdmin || $isProvider)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/2.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Bookings</h6>
                                                    <h4 class="text-right"><span>{{$bookings}}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Total Products / Your Services --}}
                        @if ($isAdmin)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/3.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Services</h6>
                                                    <h4 class="text-right"><span>{{ $services }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($isProvider)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/3.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Services</h6>
                                                    <h4 class="text-right"><span>{{ $services }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Revenue / Booking Revenue --}}
                        @if ($isAdmin)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/4.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right"> Order Revenue</h6>
                                                    <h4 class="text-right"><span>$ {{ $revenue }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($isProvider)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-statistic-5">
                                        <div class="info-box7-block">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="banner-img">
                                                        <img src="{{ asset('admin/img/banner/4.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h6 class="m-b-20 text-right">Booking Revenue</h6>
                                                    <h4 class="text-right"><span>$ {{ $revenue }}</span></h4>
                                                </div>
                                            </div>
                                            <div id="cardChart4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    {{-- Revenue Chart --}}
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Revenue Chart</h4>
                                    <div class="card-header-action">
                                        <ul class="nav nav-pills" role="tablist" id="chart-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active card-tab-style" data-toggle="tab"
                                                    data-id="1" role="tab" aria-selected="true">2017</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link card-tab-style" data-toggle="tab" data-id="2"
                                                    role="tab" aria-selected="false">2018</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link card-tab-style" data-toggle="tab" data-id="3"
                                                    role="tab" aria-selected="false">2019</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Redstar</a>
                </div>
                <div class="footer-right"></div>
            </footer>

        </div>
    </div>
@endsection
