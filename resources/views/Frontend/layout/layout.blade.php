<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strong Arms</title>
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/icon" href="{{ asset('favicon.png') }}" />
    
    <!-- All css Here -->
    <link rel="stylesheet" href="{{ asset('assets/css/allplugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <meta name="robots" content="noindex, nofollow">
</head>

<body>

<div id="preloader">
    <div id="status">
        <img src="{{ asset('assets/images/logo/preloader.gif') }}" id="preloader_image" alt="loader">
    </div>
</div>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="logo-area">
                    <a href="">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="" class="img-fluid" />
                    </a>
                </div>
            </div>
            <div class="col-md-10 col-sm-10 d-md-block d-sm-none d-none">
                <div class="main-header">
                    <div class="main-menus">
                        <nav>
                            <ul class="mamnu">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('about.us') }}">About</a></li>
                                <li><a href="{{ route('services.index') }}">Services</a></li>
                                <li><a href="{{ route('productview.index') }}">Products</a></li>
                        
                              
                                <li><a href="{{ route('blogs.all_blogs') }}">Blog</a></li>
                                
                                <li><a href="{{ route('contact.us') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="cart-head">
                        <button><i class="fas fa-shopping-cart"></i></button>
                        <div class="nav-shop-cart">
                            <div class="widget_shopping_cart_content">
                                <ul class="product_list_widget">
                                    <li class="mini_cart_item">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/products/5.jpg') }}" alt="" />
                                            <p class="product-name">Shop Item 01</p>
                                        </a>
                                        <p class="quantity">1 x <strong class="Price-amount">$200.00</strong></p>
                                        <a href="#" class="remove" title="Remove this item">x</a>
                                    </li>
                                    
                                </ul>
                                <p class="total"><strong>Subtotal:</strong> <span class="amount">$300.00</span></p>
                                <p class="buttons">
                                    <a href="#" class="btn1">View Cart</a>
                                    <a href="#" class="btn2">Checkout</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  
                    @if (Auth::user())
                    <div class="sing-in-btn">
                     
                        @if (Auth::user())
                        <div class="sing-in-btn">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                            <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                       
                        @else
                        <div class="sing-in-btn">

                        </div>
                        @endif
                        
                    </div>
                   
                    @else
                    <div class="sing-in-btn">
                    <a href="{{ route('login') }}" class="btn btn-primary" style="color: #fff;background-color: #878244;border-color: #847e2e;">Sign in</a> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div class="mobilemenu">
        <div class="mobile-menu d-md-none d-sm-block d-block">
            <nav>
                <ul>
                    <li><a href="index-2.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="javascript:void(0)">Pages</a>
                        <ul>
                            <li><a href="about.php">About</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="product-single.php">Shop Single</a></li>
                            <li><a href="event.php">Event</a></li>
                            <li><a href="event-single.php">Event Single</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="blog-single.php">Blog Single</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shop</a>
                        <ul>
                            <li><a href="shop.php">Shop Page</a></li>
                            <li><a href="product-single.php">Shop Single</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog</a>
                        <ul>
                            <li><a href="blog.php">Blog Page</a></li>
                            <li><a href="blog-single.php">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact.us') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


@yield('content')


<section class="subscribe-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="subscribe">
                    <span class="ico"><i class="far fa-envelope"></i></span>
                    <div class="conts">
                        <h2>Get Our Latest News</h2>
                        <p>Subscribe our Newsletter Now!</p>
                    </div>
                    <form>
                        <input type="email" placeholder="Email Address">
                        <button type="submit" class="btn1">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="jarallax">
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="foo-about">
                        <figure><img src="{{ asset('assets/images/logo/logo.png') }}" alt="" /></figure>
                        <div class="contents">
                            <p>All modern weapons can appreciate our broad services. Lorem Ipsum placeholder.</p>
                            <a href="#" class="btn3">Read more <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <ul class="foo-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2>Latest News</h2>
                    <div class="foo-news">
                        <div class="newslists">
                            <div class="dbox">
                                <div class="dleft">
                                    <figure><img src="{{ asset('assets/images/blog/sm-1.jpg') }}" alt="" /></figure>
                                </div>
                                <div class="dright">
                                    <h4><a href="#">Weapons 2024</a></h4>
                                    <p>Weapons can appreciate our services.</p>
                                    <span><i class="fas fa-calendar"></i> 12 Jan 2024</span>
                                </div>
                            </div>
                        </div>
                        <div class="newslists">
                            <div class="dbox">
                                <div class="dleft">
                                    <figure><img src="{{ asset('assets/images/blog/sm-2.jpg') }}" alt="" /></figure>
                                </div>
                                <div class="dright">
                                    <h4><a href="#">Weapons 2024</a></h4>
                                    <p>Weapons can appreciate our services.</p>
                                    <span><i class="fas fa-calendar"></i> 12 Jan 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2>Product Shop</h2>
                    <div class="products-foo">
                        <ul>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm1.jpg') }}" alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm2.jpg') }}" alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm3.jpg') }}" alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/products/sm4.jpg') }}" alt="" /></a></li>
                        </ul>
                        <p>For more products and guns click here!</p>
                        <a href="#" class="btn1">Our Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright © 2024 <a href="#">Strong Arms</a></p>
                </div>
                <div class="col-md-6">
                    <ul class="foo-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Copyright Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('assets/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/jarallax.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.downCount.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };

    @if (session('success'))
        toastr.success("{{ session('success') }}", "Success");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}", "Error");
    @endif
</script>

<script>
    function initMap() {
        var uluru = {lat: -36.742775, lng: 174.731559};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            scrollwheel: false,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    
       function loadMiniCart() {
            $.get("{{ route('cart.mini') }}", function (res) {
                $('.widget_shopping_cart_content').html(res.html);
                $('.cart-count-badge').text(res.count); // 🔁 update badge count
            });
        }


            $('document').ready(function () {
                loadMiniCart();
            });


            $(document).on('click', '.remove', function (e) {
                e.preventDefault();

                let id = $(this).data('id');

                $.post("{{ route('cart.remove') }}", {
                    id: id,
                    _token: "{{ csrf_token() }}"
                }, function (res) {
                    if (res.success) {
                        loadMiniCart(); // ✅ refresh after removal
                    } else {
                        alert('Error: ' + res.error);
                    }
                });
            });


</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmdG8C6ItElq5ipuFv6O9AE48wyZm_vqU&amp;callback=initMap"></script>
@yield('scripts')
</body>
</html>
