@extends('frontend.layout.layout')
@section('title', 'About us')
@section('content')
    <style>
        .ui-slider-horizontal {
            height: 8px;
            background: #d32f2f;
            border-radius: 5px;
            border: none;
        }

        .ui-slider-handle {
            top: -6px;
            width: 18px;
            height: 18px;
            background: #b71c1c;
            border: 2px solid white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.6);
            cursor: pointer;

            }input[type="search"] {
                color: white;
                background-color: #222;
                /* optional: set background */
                border: 1px solid #555;
                /* optional: for visible border */
            }

            input[type="search"]::placeholder {
                color: #ccc;
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

            .active {
                background-color: #878244 !important;
            }
    </style>

    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>Our products</h2>
                            <ul>
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="javascript:void(0)">shop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-page section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-sm-3">
                    <div class="sibebar">
                        <!-- Search -->
                        <div class="wighet search">
                            <form method="GET" action="{{ route('productview.index') }}">
                                <input type="search" name="q" placeholder="Search here" value="{{ request('q') }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <!-- Categories (Static) -->
                        <div class="wighet categories">
                            <h3>categ<span>ories</span></h3>
                            <ul>
                                @foreach ($category as $category)
                                    <li class="{{ request('category_id') == $category->id ? 'active' : '' }}">
                                        <a href="{{ route('productview.index', ['category_id' => $category->id]) }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            {{ $category->name }}
                                            <span>{{ $category->products()->where('status', 'active')->count() }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- Price Filter -->
                        <div class="wighet filter">
                            <h3>Filter by <span>Price</span></h3>
                            <form method="GET" action="{{ route('productview.index') }}">
                                <input type="hidden" name="q" value="{{ request('q') }}">
                                <div class="price-range">
                                    <div class="range">
                                        <div id="slider-range" style="margin-bottom: 15px;"></div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <input type="number" id="min_price" name="min_price" class="form-control"
                                                style="width: 45%;" value="{{ request('min_price', 0) }}">
                                            <span class="px-2 text-white">To</span>
                                            <input type="number" id="max_price" name="max_price" class="form-control"
                                                style="width: 45%;" value="{{ request('max_price', 10000) }}">
                                        </div>
                                    </div>


                                    <button type="submit" class="btn1 mt-2">FILTER</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-sm-9 pd-0">
                    <div class="row">
                        <div class="col-sm-12">

                        </div>
                        </br>
                        </br>
                        <!-- Product Cards -->
                        <div class="col-sm-12">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-sm-4 products mb-4">
                                        <figure style="width: 100%; height: 200px; overflow: hidden;">
                                            <a href="{{ route('productview.productdetail', $product->slug) }}"> <img
                                                    src="{{ asset($product->image) }}" alt=""
                                                    style="width: 85%; object-fit: cover;"></a>
                                        </figure>
                                        <div class="contents">
                                            <h3><a href="{{ route('productview.productdetail', $product->slug) }}"
                                                    style="text-decoration: none;color: white">{{ $product->name }}</a>
                                            </h3>
                                            <p>{{ $product->description }}</p>
                                            <span>${{ $product->price }}</span>
                                            <a href="javascript:void(0)" class="btn4 add-to-cart-btn"
                                                data-id="{{ $product->id }}">Add To Cart</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pagination -->
                        @if ($products->lastPage() > 1)
                            <div class="custom-pagination text-center mt-4">
                                <ul class="pagination" style="justify-content: right !important;">
                                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                            aria-label="Previous">
                                            &laquo;
                                        </a>
                                    </li>

                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            &raquo;
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <!-- jQuery UI (CDN) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 10000000,
                step: 1000,
                values: [{{ request('min_price', 0) }}, {{ request('max_price', 10000000) }}],
                slide: function(event, ui) {
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                }
            });

            // Sync slider when typing manually
            $("#min_price, #max_price").on('change', function() {
                var min = parseInt($("#min_price").val());
                var max = parseInt($("#max_price").val());
                if (min >= 0 && max <= 10000000 && min < max) {
                    $("#slider-range").slider("values", [min, max]);
                }
            });
        });
    </script>
    <!-- jQuery & jQuery UI (Required for range slider) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {


            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 10000000,
                step: 1000,
                values: [{{ request('min_price', 0) }}, {{ request('max_price', 10000000) }}],
                slide: function(event, ui) {
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                }
            });

            // Manual input sync
            $("#min_price, #max_price").on('input', function() {
                var min = parseInt($("#min_price").val()) || 0;
                var max = parseInt($("#max_price").val()) || 10000000;
                if (min >= 0 && max <= 10000000 && min < max) {
                    $("#slider-range").slider("values", [min, max]);
                }
            });
        });

        // Delegate click for dynamically added .remove button
    </script>

@endsection
