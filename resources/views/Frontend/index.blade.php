@extends('frontend.layout.layout')
@section('title', 'Home')
@section('content')

    <section class="slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 pd-0">
                    <div class="item-content">
                        @foreach ($banners as $bnr)
                        <div class="item-slider bg-img" style="background-image: url('{{ asset('uploads/homebanners/' . $bnr->image) }}');">

                            <div class="slider_section_overlay"></div>
                            <div class="container position-relative text-center">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="contents text-left">
                                            <h2 class="wow animated fadeInUp" data-wow-duration="1s">{{ $bnr->title }}</h2>
                                            <p class="mr-lu mr-ru wow animated fadeInDown" data-wow-duration="1.5s" style="width: 430px;">   {!! $bnr->description !!}</p>
                                            <div class="buttons wow animated fadeInUp" data-wow-duration="2s">
                                                <a href="{{ $bnr->redirect_url }}" class="btn1">Read More</a>
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
                                        <div >
                                         <img src="{{ asset($prd->image) }}" alt="" style="width: 35%;">
                                        </div>
                                        <div class="dright">
                                            <div class="content">
                                                <h3>{{ $prd->name }}</h3>
                                                <p>{{ $prd->price }}</p>
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
    <section class="about-area section bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="section-heading2">
                        <h2>{{ $Content->item_1 ??'' }}</h2>
                    </div>
                    <div class="about-contents">
                        <p>{{ $Content->description_1 ??'' }}</p>
                        <blockquote>{{ $Content->description_2 ??'' }}</blockquote>
                        <p>{{ $Content->description_3 ??'' }}
                        </p>
                        <div class="buttons">
                            <a href="#" class="btn1">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 ">
                    <div class="about-cata">
                        <div class="cata-list list-t1">
                            <div class="dbox">
                                <div class="dleft">
                                    <div class="content">
                                        <h4>Hunting</h4>
                                        {{-- <a href="#" class="btn3">Read More<i class="fas fa-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                                <div class="dright">
                                    <div class="cate-ico">
                                        <img src="assets/images/icons/01.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cata-list list-t2">
                            <div class="dbox">
                                <div class="dleft">
                                    <div class="content">
                                        <h4>Trainning</h4>
                                        {{-- <a href="#" class="btn3">Read More<i class="fas fa-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                                <div class="dright">
                                    <div class="cate-ico">
                                        <img src="assets/images/icons/02.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cata-list list-t1">
                            <div class="dbox">
                                <div class="dleft">
                                    <div class="content">
                                        <h4>Shoot Range</h4>
                                        {{-- <a href="#" class="btn3">Read More<i class="fas fa-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                                <div class="dright">
                                    <div class="cate-ico">
                                        <img src="assets/images/icons/03.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Videos area start here-->
    <section class="banner-area2 bg-img jarallax af">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="videos-area text-center">
                        <div class="video-popups">
                            <a href="https://www.youtube.com/watch?v=Eb9g9NB-Rnw" class="video-play-icon"><i
                                    class="fas fa-play"></i></a>
                        </div>
                        <div class="section-heading mr-0">
                            <h2 class="mr-0">{{ $Content->video_text??'' }}</h2>
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
                        <h2>Our Products</h2>
                        <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum
                            feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
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
            </div>
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
                                    <a href="#" class="btn4">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="load-btn text-center mr-t80">
                        <a href="#" class="btn1">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Products area end here-->
    <!--Twitter area start here-->
    <div class="twitter-posts section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 pd-0">
                    <div class="twitt-sliders">
                        <div class="col-sm-12">
                            <div class="contents">
                                <p>New Item on Weapon Store. We are Happy too show my new item on our store Machine Gun
                                    <br>#weapon #gun #webstrot
                                </p>
                                <span>by AkshayHandge @HandgeAkshay - Jan 23, 2024</span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="contents">
                                <p>New Item on Weapon Store. We are Happy too show my new item on our store Machine Gun
                                    <br>#weapon #gun #webstrot
                                </p>
                                <span>by AkshayHandge @HandgeAkshay - Jan 23, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Twitter area end here-->
    <!--Gallery area start here-->
    <section class="gallery-area section2 bg-img jarallax position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>Available Ranges</h2>
                        <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum
                            feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                    </div>
                </div>
                <div class="gallery col-sm-12 pd-0 position-relative">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 pd-0">
                            <div class="row">
                                <div class="col-sm-12 mr-b30">
                                    <div class="gimg">
                                        <figure>
                                            <a href="assets/images/gallery/1.jpg">
                                                <img src="assets/images/gallery/1.jpg" alt="" />
                                                <div class="con-pop">
                                                    <span><i class="fas fa-search"></i></span>
                                                </div>
                                            </a>
                                            <div class="content">
                                                <h3>Bullets Roll</h3>
                                                <p>All modern weaponts can aiate our broad services akshay.</p>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-sm-12 mr-b30">
                                    <div class="gimg">
                                        <figure>
                                            <a href="assets/images/gallery/4.jpg">
                                                <img src="assets/images/gallery/4.jpg" alt="" />
                                                <div class="con-pop">
                                                    <span><i class="fas fa-search"></i></span>
                                                </div>
                                            </a>
                                            <div class="content">
                                                <h3>Bullets Roll</h3>
                                                <p>All modern weaponts can aiate our broad services akshay.</p>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 pd-0">
                            <div class="col-sm-12 mr-b30">
                                <div class="gimg">
                                    <figure>
                                        <a href="assets/images/gallery/2.jpg">
                                            <img src="assets/images/gallery/2.jpg" alt="" />
                                            <div class="con-pop">
                                                <span><i class="fas fa-search"></i></span>
                                            </div>
                                        </a>
                                        <div class="content">
                                            <h3>Bullets Roll</h3>
                                            <p>All modern weaponts can aiate our broad services akshay.</p>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 pd-0">
                            <div class="row">
                                <div class="col-sm-12 mr-b30">
                                    <div class="gimg">
                                        <figure>
                                            <a href="assets/images/gallery/3.jpg">
                                                <img src="assets/images/gallery/3.jpg" alt="" />
                                                <div class="con-pop">
                                                    <span><i class="fas fa-search"></i></span>
                                                </div>
                                            </a>
                                            <div class="content">
                                                <h3>Bullets Roll</h3>
                                                <p>All modern weaponts can aiate our broad services akshay.</p>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-sm-12 mr-b30">
                                    <div class="gimg">
                                        <figure>
                                            <a href="assets/images/gallery/6.jpg">
                                                <img src="assets/images/gallery/6.jpg" alt="" />
                                                <div class="con-pop">
                                                    <span><i class="fas fa-search"></i></span>
                                                </div>
                                            </a>
                                            <div class="content">
                                                <h3>Bullets Roll</h3>
                                                <p>All modern weaponts can aiate our broad services akshay.</p>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 pd-0 position-relative">
                            <div class="col-sm-12 mr-b30  lst_div_box_galery d-md-block d-sm-none d-none">
                                <div class="gimg">
                                    <figure>
                                        <a href="assets/images/gallery/5.jpg">
                                            <img src="assets/images/gallery/5.jpg" alt="" />
                                            <div class="con-pop">
                                                <span><i class="fas fa-search"></i></span>
                                            </div>
                                        </a>
                                        <div class="content">
                                            <h3>Bullets Roll</h3>
                                            <p>All modern weaponts can aiate our broad services akshay.</p>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
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
                            <fieldset class="arrows">
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
                        <p>With state-of-the-art indoor training facilities and full service custom shop on lion, we can
                            accommodate most requests.</p>
                        <h1>P. +880 451 455</h1>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem is bibendum auctor, nisi
                            elit consequat ipsum, nec sagittis sem nibh idlit. Duis sed odio sit amet nibh vulputate cursus
                            a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.</p>
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
    <!--Price area Start here-->
    <section class="price-area section bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>Trainning Pricing</h2>
                        <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum
                            feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 pd-0">
                    <div class="price-lists">
                        <div class="phead">
                            <ul class="rate">
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <h3>Basic Plan</h3>
                            <div class="prices">
                                <strong><i class="fas fa-dollar-sign"></i>49</strong>
                                <span>/per mo</span>
                            </div>
                        </div>
                        <div class="pbody">
                            <ul>
                                <li><span>MC5 Carbine</span></li>
                                <li><span>MC6 Carbine</span></li>
                                <li><span>MC7 Long Range Carbine</span></li>
                                <li><span>MR1 Bolt Action</span></li>
                            </ul>
                            <a href="#" class="btn4">Book Now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 pd-0">
                    <div class="price-lists middel">
                        <div class="phead">
                            <ul class="rate">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <h3>Basic Plan</h3>
                            <div class="prices">
                                <strong><i class="fas fa-dollar-sign"></i>49</strong>
                                <span>/per mo</span>
                            </div>
                        </div>
                        <div class="pbody">
                            <ul>
                                <li><span>MC5 Carbine</span></li>
                                <li><span>MC6 Carbine</span></li>
                                <li><span>MC7 Long Range Carbine</span></li>
                                <li><span>MR1 Bolt Action</span></li>
                            </ul>
                            <a href="#" class="btn4">Book Now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 pd-0">
                    <div class="price-lists">
                        <div class="phead">
                            <ul class="rate">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <h3>Ultimate Plan</h3>
                            <div class="prices">
                                <strong><i class="fas fa-dollar-sign"></i>99</strong>
                                <span>/per mo</span>
                            </div>
                        </div>
                        <div class="pbody">
                            <ul>
                                <li><span>MC5 Carbine</span></li>
                                <li><span>MC6 Carbine</span></li>
                                <li><span>MC7 Long Range Carbine</span></li>
                                <li><span>MR1 Bolt Action</span></li>
                            </ul>
                            <a href="#" class="btn4">Book Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Price area End here-->
    <!--Banner area start here-->
    <section class="banner-area3 section af bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-md-offset-5">
                    <div class="content">
                        <div class="con">
                            <h2>THREAT-MANAGEMENT <br>EXPERTS</h2>
                            <p>Our facilities in Tilden, TX offer great ranges and accommns for anyone looking to attend one
                                of our hunts or training ses. Tilden has a 1000 yard range with steel every 100 yards as
                                well a unknown distance steel throughout. For aerial opens we have vehicle interdiction.</p>
                            <a href="#" class="btn1">read more</a>
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
                        <h2>Latest News</h2>
                        <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum
                            feugiat, gun are best velit mauris aks egestasut aliquam.</p>
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
                                    <div class="heart_box">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </div>
                                    <h6><i class="fa fa-calendar-alt"></i>29-Jan-2024</h6>
                                    <h3>Weapon Services - 2024</h3>
                                    <h5><a href="#">Read More</a> &nbsp;<i class="fa fa-long-arrow-alt-right"></i>
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
                                        <h3>{{  $blog->title }}</h3>
                                        <h6><i class="fa fa-calendar-alt"></i>{{ $blog->created_at->format('d M Y') }}</h6>
                                        <div class="news_border_bottom">
                                        </div>
                                    </div>
                                </div>
                                <div class="news_botton_cont">
                                    <p>{{ $blog->description }}.</p>
                                    <h5><a href="#">Read More</a> &nbsp;<i class="fa fa-long-arrow-alt-right"></i>
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
