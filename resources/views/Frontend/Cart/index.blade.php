@extends('Frontend.layout.layout')

@section('title', 'Cart')

@section('content')
    <style>
        /* Modern Weapons View Cart Styles */
        .view-cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .view-cart-header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 20px;
        }

        .view-cart-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #333;
            margin-bottom: 10px;
        }

        .view-cart-title-highlight {
            color: #d32f2f;
        }

        .view-cart-subtitle {
            font-size: 1.1rem;
            color: #666;
        }

        .view-cart-items {
            margin-bottom: 40px;
        }

        .view-cart-item {
            display: flex;
            padding: 20px 0;
            border-bottom: 1px solid #e0e0e0;
            flex-wrap: wrap;
        }

        .view-cart-item-image {
            position: relative;
            width: 150px;
            margin-right: 20px;
        }

        .view-cart-weapon-img {
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .view-cart-item-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #d32f2f;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .view-cart-item-details {
            flex: 1;
            min-width: 250px;
        }

        .view-cart-item-name {
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: #878244;
        }

        .view-cart-item-sku {
            font-size: 0.8rem;
            color: #777;
            margin-bottom: 10px;
        }

        .view-cart-item-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .view-cart-item-caliber,
        .view-cart-item-color,
        .view-cart-item-stock,
        .view-cart-item-rounds {
            font-size: 0.85rem;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .view-cart-item-caliber {
            background: #f5f5f5;
            border: 1px solid #ddd;
        }

        .view-cart-item-color {
            background: #333;
            color: white;
        }

        .view-cart-item-stock {
            background: #4caf50;
            color: white;
        }

        .view-cart-item-rounds {
            background: #2196f3;
            color: white;
        }

        .view-cart-item-actions {
            display: flex;
            gap: 15px;
        }

        .view-cart-item-wishlist,
        .view-cart-item-remove {
            background: none;
            border: none;
            color: #666;
            font-size: 0.85rem;
            cursor: pointer;
            padding: 0;
        }

        .view-cart-item-wishlist:hover,
        .view-cart-item-remove:hover {
            color: #d32f2f;
        }

        .view-cart-item-pricing {
            width: 200px;
            text-align: right;
        }

        .view-cart-quantity {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .view-cart-qty-btn {
            width: 30px;
            height: 30px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            font-weight: bold;
            cursor: pointer;
        }

        .view-cart-qty-input {
            width: 40px;
            height: 30px;
            text-align: center;
            border: 1px solid #ddd;
            margin: 0 5px;
        }

        .view-cart-price {
            font-size: 1.1rem;
            color: #777;
            margin-bottom: 5px;
        }

        .view-cart-item-total {
            font-size: 1.2rem;
            font-weight: bold;
            color: #d32f2f;
        }

        .view-cart-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
        }

        .view-cart-promo {
            flex: 1;
            min-width: 300px;
        }

        .view-cart-totals {
            flex: 1;
            min-width: 300px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        .view-cart-summary-title {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #777;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .view-cart-promo-input {
            display: flex;
        }

        .view-cart-promo-field {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-right: none;
            border-radius: 4px 0 0 4px;
        }

        .view-cart-promo-btn {
            padding: 0 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .view-cart-total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .view-cart-total-tax {
            font-weight: bold;
        }

        .view-cart-grand-total {
            font-size: 1.3rem;
            font-weight: bold;
            color: #d32f2f;
            border-bottom: none;
            margin-top: 15px;
        }

        .view-cart-legal {
            margin: 20px 0;
        }

        .view-cart-age-verify,
        .view-cart-terms {
            margin-bottom: 10px;
            font-size: 0.85rem;
        }

        .view-cart-age-verify input,
        .view-cart-terms input {
            margin-right: 8px;
        }

        .view-cart-checkout-btn {
            width: 100%;
            padding: 15px;
            margin-left: 36%;
            background: #d32f2f;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .view-cart-checkout-btn:hover {
            background: #b71c1c;
        }

        .view-cart-continue-shopping {
            text-align: center;
            margin-top: 15px;
        }

        .view-cart-continue-link {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .view-cart-continue-link:hover {
            color: #d32f2f;
        }

        .view-cart-security {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .view-cart-security-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #4caf50;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .view-cart-ffl-notice {
            font-size: 0.85rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .view-cart-item {
                flex-direction: column;
            }

            .view-cart-item-image {
                margin-bottom: 15px;
                width: 100%;
            }

            .view-cart-item-pricing {
                width: 100%;
                text-align: left;
                margin-top: 15px;
            }

            .view-cart-quantity {
                justify-content: flex-start;
            }
        }
    </style>
    <!--Header area end here-->
    <!--Breadcumb area start here-->
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>cart</h2>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="javascript:void(0)">cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
    <!-- weapon login wrapper start -->
    <div class="login_section">
        <!-- login_form_wrapper -->
        <div class="login_form_wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-heading">
                            <h2>View Cart</h2>
                            <!--  <p>please login to access weapon store area.</p> -->
                        </div>
                    </div>
                </div>
                <!--my-code--->
                <div class="view-cart-container">
                    <div class="cart-container">
                        @if ($cartItems->count() >= 0)
                            <div class="view-cart-items">
                                @foreach ($cartItems as $item)
                                    <div class="cart-item d-flex justify-content-between align-items-center py-2 border-bottom"
                                        data-rowid="{{ $item->rowId }}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($item->options->image) }}" width="60"
                                                alt="{{ $item->name }}">
                                            <div class="ms-3">
                                                <p class="mb-0 fw-bold">{{ $item->name }}</p>
                                                <p class="mb-0">Price: ${{ number_format($item->price, 2) }}</p>
                                            </div>
                                        </div>

                                        <div>
                                            <input type="number" class="form-control update-cart-qty"
                                                data-rowid="{{ $item->rowId }}" value="{{ $item->qty }}" min="1"
                                                style="width: 80px;">
                                        </div>

                                        <div>
                                            <p class="mb-0">Total: ${{ $item->price * $item->qty }}</p>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger"
                                                title="Remove item" data-rowid="{{ $item->rowId }}">
                                                <i class="fas fa-trash-alt">
                                                </i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="cart-summary mt-4" style="color:#ddd">
                                <h5>Subtotal: $<span id="cart-subtotal">{{ $cartTotal }}</span></h5>
                            </div>
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>

                    <div class="view-cart-summary">
                        <div class="view-cart-totals">
                            <h3 class="view-cart-summary-title">ORDER SUMMARY</h3>
                            <div class="view-cart-total-row">
                                <span>Subtotal (<span id="cart-subtotal-count">{{ $cartItems->count() }}</span>)</span>
                                <span id="cart-subtotal-value">${{ $cartTotal }}</span>
                            </div>


                            <div class="view-cart-total-row view-cart-grand-total">
                                <span>TOTAL</span>
                                <span id="cart-total">${{ $cartTotal }}</span>
                            </div>


                            <a href="{{ route('cart.checkout') }}" class="view-cart-checkout-btn">
                                PROCEED TO SECURE CHECKOUT <i class="fas fa-lock"></i>
                            </a>


                            <div class="view-cart-continue-shopping">
                                <a href="{{ route('productview.index') }}" class="view-cart-continue-link"><i
                                        class="fas fa-chevron-left"></i>
                                    CONTINUE SHOPPING</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--my-code--->
            </div>
        </div>
        <!-- /.login_form_wrapper-->
    </div>
@endsection
