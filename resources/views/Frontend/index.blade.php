@extends('Frontend.layout.layout')
@section('title', 'Home')
@section('content')

    <section class="slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 pd-0">
                    <div class="item-content">
                        @foreach ($banners as $bnr)
                            <div class="item-slider bg-img"
                                style="background-image: url('{{ asset('uploads/homebanners/' . $bnr->image) }}');">

                                <div class="slider_section_overlay"></div>
                                <div class="container position-relative text-center">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="contents text-left">
                                                <h2 class="wow animated fadeInUp" data-wow-duration="1s">{{ $bnr->title }}
                                                </h2>
                                                <p class="mr-lu mr-ru wow animated fadeInDown" data-wow-duration="1.5s"
                                                    style="width: 430px;"> {!! $bnr->description !!}</p>
                                                <div class="buttons wow animated fadeInUp" data-wow-duration="2s">
                                                    {{-- <a href="{{ $bnr->redirect_url }}" class="btn1">Read More</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="col-sm-12">
                        <div class="item-thumbnail">
                            @if ($Product->isEmpty())
                            @else
                                @foreach ($Product as $prd)
                                    <a href="#" class="col-sm-3" data-slide-index="0">
                                        <div class="items">
                                            <div class="dbox">
                                                <div>
                                                    <img src="{{ asset($prd->image) }}" alt="" style="width: 35%;">
                                                </div>
                                                <div class="dright">
                                                    <div class="content">
                                                        <h3>{{ $prd->name }}</h3>
                                                        <p> $ {{ $prd->price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Slider area end here-->
    <!--About area start here-->

    @include('Frontend.partials.whoweare')

    <!--Videos area start here-->
    <section class="banner-area2 bg-img jarallax af">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                   @php
                        $youtubeUrl = $cms_content[12]->description ?? '#';
                    @endphp
                    
                    <div class="videos-area text-center">
                        <div class="video-popups">
                            <a href="{{ $youtubeUrl }}" class="" target="_blank" rel="noopener">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                        <div class="section-heading mr-0">
                            <h2 class="mr-0">{{ $cms_content[12]->name ?? 'N/A' }}</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="lg-text">
            {{-- <h1>Coming Soon</h1> --}}
        </div>
    </section>
    <!--Videos area end here-->
    <!--Products area start here-->
    <section class="products-area section bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>{{ $cms_content[4]->name ?? 'N/A' }}</h2>
                        <p>{!! $cms_content[4]->description ?? 'N/A' !!}.</p>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 col-sm-12 pro-ctg">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 pd-0">
                            <div class="catagories-lists">
                                <div class="contents">
                                    <figure><img src="assets/images/products/1.png" alt="" /></figure>
                                    <h3>Handguns</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 pd-0">
                            <div class="catagories-lists nd">
                                <div class="contents">
                                    <figure><img src="assets/images/products/2.png" alt="" /></figure>
                                    <h3>Machine guns</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 pd-0">
                            <div class="catagories-lists">
                                <div class="contents">
                                    <figure><img src="assets/images/products/3.png" alt="" /></figure>
                                    <h3>Silencers</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 pd-0">
                            <div class="catagories-lists nd">
                                <div class="contents">
                                    <figure><img src="assets/images/products/4.png" alt="" /></figure>
                                    <h3>Gun Bullet</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12 col-sm-12 pd-0">
                    <div class="pro-sliders">
                        @foreach ($Product as $product)
                            <div class="col-sm-12">
                                <div class="products text-center">
                                    <figure style="width: 100%; height: 200px; overflow: hidden;">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </figure>
                                    <div class="contents">
                                        <h3>{{ $product->name }}</h3>
                                        <span>${{ number_format($product->price, 2) }}</span>
                                        <a href="javascript:void(0)" class="btn4 add-to-cart-btn"
                                            data-id="{{ $product->id }}">Add To Cart</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="load-btn text-center mr-t80">
                        <a href="{{ route('productview.index') }}" class="btn1">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Products area end here-->
    <!--Twitter area start here-->
    @include('Frontend.partials.twitter')
    <!--Twitter area end here-->
    <!--Gallery area start here-->
    <section class="gallery-area section2 bg-img jarallax position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h2>{{ $cms_content[3]->name ?? 'Featured Products' }}</h2>
                        <p>{!! $cms_content[3]->description ?? 'All modern weapons can appreciate our broad services.' !!}</p>
                    </div>
                </div>
            </div>

            <div class="row gallery-grid">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gimg">
                        <figure>
                            <a href="{{ route('productview.productdetail', $Product[0]->slug) }}">
                                <img src="{{ isset($Product[0]) ? asset($Product[0]->image) : asset('assets/images/gallery/1.jpg') }}"
                                    class="img-fluid w-100" />
                                <div class="con-pop"><span><i class="fas fa-search"></i></span></div>
                            </a>
                            <div class="content">
                                <h3>{{ $Product[0]->name ?? 'Product Title' }}</h3>
                                <p>{{ $Product[0]->description ?? 'Short product description goes here.' }}</p>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gimg">
                        <figure>
                            <a href="{{ route('productview.productdetail', $Product[1]->slug) }}">
                                <img src="{{ isset($Product[1]) ? asset($Product[1]->image) : asset('assets/images/gallery/2.jpg') }}"
                                    class="img-fluid w-100" />
                                <div class="con-pop"><span><i class="fas fa-search"></i></span></div>
                            </a>
                            <div class="content">
                                <h3>{{ $Product[1]->name ?? 'Product Title' }}</h3>
                                <p>{{ $Product[1]->description ?? 'Short product description goes here.' }}</p>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gimg">
                        <figure>
                            <a href="{{ route('productview.productdetail', $Product[2]->slug) }}">
                                <img src="{{ isset($Product[2]) ? asset($Product[2]->image) : asset('assets/images/gallery/3.jpg') }}"
                                    class="img-fluid w-100" />
                                <div class="con-pop"><span><i class="fas fa-search"></i></span></div>
                            </a>
                            <div class="content">
                                <h3>{{ $Product[2]->name ?? 'Product Title' }}</h3>
                                <p>{{ $Product[2]->description ?? 'Short product description goes here.' }}</p>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gimg">
                        <figure>
                            <a href="{{ route('productview.productdetail', $Product[3]->slug) }}">
                                <img src="{{ isset($Product[3]) ? asset($Product[3]->image) : asset('assets/images/gallery/4.jpg') }}"
                                    class="img-fluid w-100" />
                                <div class="con-pop"><span><i class="fas fa-search"></i></span></div>
                            </a>
                            <div class="content">
                                <h3>{{ $Product[3]->name ?? 'Product Title' }}</h3>
                                <p>{{ $Product[3]->description ?? 'Short product description goes here.' }}</p>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gimg">
                        <figure>
                            < <a href="{{ route('productview.productdetail', $Product[4]->slug) }}">
                                <img src="{{ isset($Product[4]) ? asset($Product[4]->image) : asset('assets/images/gallery/5.jpg') }}"
                                    class="img-fluid w-100" />
                                <div class="con-pop"><span><i class="fas fa-search"></i></span></div>
                                </a>
                                <div class="content">
                                    <h3>{{ $Product[4]->name ?? 'Product Title' }}</h3>
                                    <p>{{ $Product[4]->description ?? 'Short product description goes here.' }}</p>
                                </div>
                        </figure>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gimg">
                        <figure>
                            <a href="{{ route('productview.productdetail', $Product[5]->slug) }}">
                                <img src="{{ isset($Product[5]) ? asset($Product[5]->image) : asset('assets/images/gallery/6.jpg') }}"
                                    class="img-fluid w-100" />
                                <div class="con-pop"><span><i class="fas fa-search"></i></span></div>
                            </a>
                            <div class="content">
                                <h3>{{ $Product[5]->name ?? 'Product Title' }}</h3>
                                <p>{{ $Product[5]->description ?? 'Short product description goes here.' }}</p>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Gallery area end here-->
    <!--Trainning area Start here-->
    <section class="training-area section bg-img jarallax af">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="training-forms">
                        <form id="contactform" action="{{ route('contact.save') }}" method="POST">
                            @csrf
                            <fieldset>
                                <input type="text" placeholder="Full Name" name="full_name"
                                    value="{{ old('full_name') }}">
                            </fieldset>
                            <fieldset>
                                <input type="email" placeholder="Email Address" name="email"
                                    value="{{ old('email') }}">
                            </fieldset>
                            <fieldset>
                                <input type="text" placeholder="Subject" name="subject"
                                    value="{{ old('subject') }}">
                            </fieldset>
                            {{-- <fieldset>
                                <select>
                                    <option>Weapon / Plans</option>
                                    <option>Weapon / Plans</option>
                                    <option>Weapon / Plans</option>
                                    <option>Weapon / Plans</option>
                                </select>
                            </fieldset> --}}
                            {{-- <fieldset class="arrows">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6 pd-0">
                                        <select>
                                            <option>Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7 col-sm-6 pd-r0">
                                        <input type="number" placeholder="Age">
                                    </div>
                                </div>
                            </fieldset> --}}
                            <fieldset>
                                <textarea placeholder="Message" name="message" value="{{ old('message') }}"></textarea>
                            </fieldset>
                            <button type="submit" class="btn1">Send Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="training-con pd-t60">
                        <h2>{{ $cms_content[5]->name ?? 'N/A' }}</h2>
                        <p>{{ $cms_content[5]->description ?? 'N/A' }}</p>
                        <h1>{{ $cms_content[5]->description_1 ?? 'N/A' }}</h1>
                        <p>{{ $cms_content[5]->description_2 ?? 'N/A' }}</p>
                        <ul>
                            <li><i class="fas fa-long-arrow-alt-right"></i>{{ $cms_content[5]->item_1 ?? 'N/A' }}</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>{{ $cms_content[5]->item_2 ?? 'N/A' }}</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>{{ $cms_content[5]->item_3 ?? 'N/A' }}</li>
                            <li><i class="fas fa-long-arrow-alt-right"></i>{{ $cms_content[5]->item_4 ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Trainning area End here-->
    <!--Price area Start here-->
    @include('Frontend.partials.trainers')
    <!--Price area End here-->
    <!--Banner area start here-->
    <section class="banner-area3 section af bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-md-offset-5">
                    <div class="content">
                        <div class="con">
                            <h2>{{ $cms_content[7]->name ?? 'N/A' }}</h2>
                            <p>{{ $cms_content[7]->description ?? 'N/A' }}</p>
                            {{-- <a href="#" class="btn1">read more</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner area end here-->
    <!--Blog area start here-->
    <section class="blog-area section bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>{{ $cms_content[8]->name ?? 'N/A' }}</h2>
                        <p>{{ $cms_content[8]->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 pd-0">
                    <div class="news_left_wrapper">
                        <div class="news_left_img_overlay"></div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="news_left_cont position-relative">
                                    <p><i>News, weapons ,training</i></p>
                                    {{-- <div class="heart_box">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </div> --}}
                                    <h6><i class="fa fa-calendar-alt"></i> {{ \Carbon\Carbon::now()->format('d-M-Y') }}
                                    </h6>

                                    <h3>Weapon Services - {{ \Carbon\Carbon::now()->year }}</h3>

                                    <h5><a href="{{ route('blogs.all_blogs') }}">Read More</a> &nbsp;<i
                                            class="fa fa-long-arrow-alt-right"></i>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pd-0">
                    <div class="ln-sliders">

                        @foreach ($blogs as $blog)
                            <div class="col-sm-12" style="height: 130%">
                                <div class="main_news_right_box">
                                    <div class="news_right_box1_wrapper">
                                        <div class="news_right_box1">
                                            <h3>{{ $blog->title }}</h3>
                                            <h6><i class="fa fa-calendar-alt"></i>{{ $blog->created_at->format('d M Y') }}
                                            </h6>
                                            <div class="news_border_bottom">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news_botton_cont">
                                        <p>{{ $blog->description }}.</p>
                                        <h5><a href="{{ route('blogs.all_blogs') }}">Read More</a> &nbsp;<i
                                                class="fa fa-long-arrow-alt-right"></i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        function loadCategory(categoryId) {
            $.get(`/shop/category/${categoryId}`, function(data) {
                $('#product-container').html(data);
            });
        }
    </script>
@endsection
