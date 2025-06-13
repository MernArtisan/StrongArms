@extends('frontend.layout.layout')
@section('title', 'About us')
@section('content')
    <!--Breadcumb area start here-->
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>About us</h2>
                            <ul>
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="javascript:void(0)">about us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
    <!--About area start here-->

    @include('Frontend.partials.whoweare')

    <!--About area end here-->
    <!--Twitter area start here-->
    @include('Frontend.partials.twitter')

    <!--Twitter area end here-->
    <!--Partner area start here-->
    <section class="partner-area section bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>{{ $cms_content[9]->name ?? 'N/A' }}</h2>
                        <p>{{ $cms_content[9]->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="partner-list">
                        <ul>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/1.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/2.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/3.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/4.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/5.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/6.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/7.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/8.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/9.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('admin/assets/images/client/10.png') }}"
                                        alt="" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
