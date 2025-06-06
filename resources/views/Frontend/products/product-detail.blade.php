@extends('frontend.layout.layout')
@section('title', $product->name)
@section('content')
    <style>
        .product-details .products-photo .nav-tabs li {
            display: inline-block;
            width: 12% !important;
            padding: 0 10px;
        }
    </style>
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>PRODUCT details</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">PRODUCT</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details area start here -->
    <section class="product-details section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="products-photo">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach ($product->images as $key => $img)
                                <div role="tabpanel" class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                    id="img{{ $key }}">
                                    <img src="{{ asset($img->image) }}" alt=""
                                        style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;" />
                                </div>
                            @endforeach
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($product->images as $key => $img)
                                <li role="presentation" class="nav-item">
                                    <a href="#img{{ $key }}" role="tab" data-bs-toggle="tab"
                                        class="nav-link {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset($img->image) }}" alt=""
                                            style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="single-product-content">
                        <h2>{{ $product->name }}</h2>
                        <div class="product-review">
                            <ul>
                                @for ($i = 0; $i < 5; $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                            <span>{{ $product->reviews_count ?? 0 }} Reviews</span>
                            <a href="#"> Add Your Review</a>
                        </div>
                        <div class="con">
                            <p>{{ $product->description }}</p>
                            <ul>
                                <li><i class="fa fa-angle-double-right"></i> High quality build and finish.</li>
                                <li><i class="fa fa-angle-double-right"></i> Includes customizable attachments.</li>
                                <li><i class="fa fa-angle-double-right"></i> Designed for professionals.</li>
                                <li><i class="fa fa-angle-double-right"></i> Limited edition availability.</li>
                            </ul>
                        </div>
                        <div class="select-pro">
                            <form method="POST" action="" class="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group">
                                    <input class="form-control w-25 quantity-input" type="number" name="quantity"
                                        value="1" min="1" />
                                </div>
                                <div class="price mt-2">
                                    <strong>${{ number_format($product->price, 2) }}</strong>
                                </div>
                                <div class="buttons mt-3">
                                    <a href="javascript:void(0)" class="btn1 add-to-cart-btn"
                                        data-id="{{ $product->id }}">Add to Cart</a>
                                    <a href="#" class="btn4">Buy now!</a>
                                    <a href="#" class="heart"><i class="fa fa-heart"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Product Details Tabs Section remain unchanged-->
    <!--Products area start here-->
    <section class="products-area section4 bg-img jarallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-heading">
                        <h2>Our Products</h2>
                        <p>All modern weapons can appreciate our broad services akshay handge pharetra, eratd fermentum
                            feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $item)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="products text-center">
                            <figure style="width: 100%; height: 250px; overflow: hidden; border-radius: 8px;">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </figure>
                            <div class="contents mt-2">
                                <h5>{{ $item->name }}</h5>
                                <span class="d-block mb-2">${{ number_format($item->price, 2) }}</span>
                                <a href="{{ route('product.show', $item->slug) }}" class="btn4">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

