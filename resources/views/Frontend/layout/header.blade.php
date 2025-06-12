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
                                <li><a href="{{ route('trainers') }}">Trainers</a></li>
                                <li><a href="{{ route('productview.index') }}">Products</a></li>
                                <li><a href="{{ route('blogs.all_blogs') }}">Blog</a></li>
                                <li><a href="{{ route('contact.us') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    @php
                        $cartItems = \Gloudemans\Shoppingcart\Facades\Cart::content();
                        $cartSubtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                    @endphp
                    <div class="cart-head">
                        <button style="position: relative;">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cart-count" class="cart-count-badge">{{ $cartItems->count() }}</span>
                        </button>

                        <div class="nav-shop-cart">
                            <div class="widget_shopping_cart_content">

                                @if ($cartItems->count() > 0)
                                    <ul class="product_list_widget">
                                        @foreach ($cartItems as $item)
                                            <li class="mini_cart_item" data-rowid="{{ $item->rowId }}">
                                                <a href="#">
                                                    <img src="{{ asset($item->options->image) }}"
                                                        alt="{{ $item->name }}" />
                                                    <p class="product-name">{{ $item->name }}</p>
                                                </a>
                                                <p class="quantity">{{ $item->qty }} x <strong
                                                        class="Price-amount">${{ number_format($item->price, 2) }}</strong>
                                                </p>
                                                <a href="javascript:void(0)" class="remove-item"
                                                    title="Remove this item" data-rowid="{{ $item->rowId }}">x</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="total"><strong>Subtotal:</strong> <span
                                            class="amount">${{ $cartSubtotal }}</span></p>
                                    <p class="buttons">
                                        <a href="{{ route('cart.index') }}" class="btn1">View Cart</a>
                                        <a href="{{ route('cart.checkout') }}" class="btn2">Checkout</a>
                                    </p>
                                @else
                                    <p class="text-center">Your cart is empty.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if (Auth::user())
                        <div class="sing-in-btn">

                            @if (Auth::user()->hasRole('provider') || Auth::user()->hasRole('admin'))
                                <div class="sing-in-btn">
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary"
                                        style="color: #fff; background-color: #878244; border-color: #847e2e;">
                                        <i data-feather="monitor"></i> Dashboard
                                    </a>
                                    <a href="{{ route('logout') }}" class="btn btn-primary"
                                        style="color: #fff; background-color: #878244; border-color: #847e2e;">
                                        <i data-feather="log-out"></i> Logout
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            @else
                                <div class="sing-in-btn">
                                    <a href="{{ route('account.profile') }}" class="btn btn-primary"
                                        style="color: #fff;background-color: #878244;border-color: #847e2e;">
                                        <i data-feather="user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <a href="{{ route('logout') }}" class="btn btn-primary"
                                        style="color: #fff; background-color: #878244; border-color: #847e2e;">
                                        <i data-feather="log-out"></i> Logout
                                    </a>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            @endif

                        </div>
                    @else
                        <div class="sing-in-btn">
                            <a href="{{ route('login') }}" class="btn btn-primary"
                                style="color: #fff;background-color: #878244;border-color: #847e2e;">Sign in</a>
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
