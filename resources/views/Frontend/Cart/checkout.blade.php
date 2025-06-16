@extends('Frontend.layout.layout')
@section('title', 'Checkout')

@section('content')
    <style>
        /* Modern Weapons Checkout Page Styles */
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            color: #777;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .checkout-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }

        .checkout-title-highlight {
            color: #d32f2f;
        }

        .checkout-progress {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            position: relative;
        }

        .checkout-progress:before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }

        .checkout-progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 25%;
            padding: 0 10px;
        }

        .checkout-progress-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e0e0e0;
            color: #999;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 8px;
            border: 2px solid #e0e0e0;
        }

        .checkout-progress-text {
            font-size: 0.85rem;
            color: #999;
            text-align: center;
        }

        .checkout-progress-step.checkout-active .checkout-progress-number {
            background: #d32f2f;
            color: white;
            border-color: #d32f2f;
        }

        .checkout-progress-step.checkout-active .checkout-progress-text {
            color: #878244;
            font-weight: 500;
        }

        .checkout-content {
            display: flex;
            gap: 30px;
        }

        .checkout-main {
            flex: 2;
        }

        .checkout-sidebar {
            flex: 1;
            min-width: 300px;
        }

        .checkout-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }

        .checkout-section-title {
            font-size: 1.2rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .checkout-section-icon {
            margin-right: 10px;
            color: #d32f2f;
        }

        .checkout-form-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .checkout-form-group {
            flex: 1;
            min-width: 100%;
            margin-bottom: 15px;
        }

        .checkout-col-2 {
            min-width: calc(50% - 10px);
        }

        .checkout-label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .checkout-input,
        .checkout-select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .checkout-input:focus,
        .checkout-select:focus {
            outline: none;
            border-color: #d32f2f;
            box-shadow: 0 0 0 2px rgba(211, 47, 47, 0.1);
        }

        .checkout-ffl-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .checkout-ffl-title {
            font-size: 1rem;
            margin-bottom: 15px;
            color: #d32f2f;
        }

        .checkout-ffl-toggle {
            margin-bottom: 15px;
        }

        .checkout-ffl-toggle input {
            margin-right: 8px;
        }

        .checkout-ffl-details {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 4px;
        }

        .checkout-ffl-find-btn {
            background: #333;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .checkout-payment-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .checkout-payment-tab {
            padding: 10px 20px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            font-weight: 500;
            cursor: pointer;
        }

        .checkout-payment-tab.checkout-active {
            border-bottom-color: #d32f2f;
            color: #d32f2f;
        }

        .checkout-card-icons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .checkout-card-icons i {
            font-size: 1.5rem;
            color: #666;
        }

        .checkout-review-items {
            margin-bottom: 30px;
        }

        .checkout-review-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .checkout-review-product {
            flex: 2;
            display: flex;
            align-items: center;
        }

        .checkout-review-img {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
            border: 1px solid #ddd;
        }

        .checkout-review-name {
            font-size: 0.95rem;
            margin-bottom: 3px;
        }

        .view-cart-continue-shopping {
            text-align: center;
            margin-top: 15px;
        }

        .checkout-review-sku {
            font-size: 0.8rem;
            color: #777;
        }

        .checkout-review-qty {
            flex: 1;
            text-align: center;
        }

        .checkout-review-price {
            flex: 1;
            text-align: right;
            font-weight: 500;
        }

        .checkout-agreements {
            margin: 30px 0;
        }

        .checkout-agreement {
            margin-bottom: 15px;
        }

        .checkout-agreement input {
            margin-right: 8px;
        }

        .checkout-agreement label {
            font-size: 0.9rem;
        }

        .checkout-submit-btn {
            width: 100%;
            padding: 15px;
            background: #d32f2f;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .checkout-submit-btn:hover {
            background: #b71c1c;
        }

        .checkout-order-summary {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }

        .checkout-summary-title {
            font-size: 1.2rem;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .checkout-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .checkout-summary-row.checkout-total {
            font-weight: bold;
            font-size: 1.1rem;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .checkout-security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            padding: 10px;
            background: #d32f2f;
            border-radius: 4px;
            font-size: 0.9rem;
            color: #fff;
            font-weight: 500;
        }

        .checkout-support {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }

        .checkout-support-title {
            font-size: 1.1rem;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .checkout-support-text {
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .checkout-support-text i {
            margin-right: 8px;
            color: #d32f2f;
        }

        .checkout-support-notice {
            font-size: 0.8rem;
            color: #666;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .checkout-content {
                flex-direction: column;
            }

            .checkout-progress-step {
                width: auto;
                flex: 1;
            }

            .checkout-progress-text {
                font-size: 0.7rem;
            }

            .checkout-col-2 {
                min-width: 100%;
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
                            <h2>Check Out</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">Checkout</a></li>
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
                            <h2>Check Out</h2>
                        </div>
                    </div>
                </div>
                <form action="{{ route('order.checkout') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="checkout-container">
                            <div class="checkout-content">
                                <div class="col-lg-6">
                                    <div class="checkout-main">
                                        <!-- Shipping Information -->
                                        <section class="checkout-section">
                                            <h2 class="checkout-section-title">
                                                <i class="fas fa-truck checkout-section-icon"></i>
                                                SHIPPING INFORMATION
                                            </h2>

                                            <div class="checkout-form-grid">
                                                <div class="checkout-form-group checkout-col-2">
                                                    <label class="checkout-label">First Name *</label>
                                                    <input type="text" class="checkout-input" name="name"
                                                        value="{{ Auth::user()->name ?? '' }} " style="color: #333"
                                                        required>
                                                </div>
                                                {{-- <div class="checkout-form-group checkout-col-2">
                                                    <label class="checkout-label">Last Name *</label>
                                                    <input type="text" class="checkout-input" name="last_name" required>
                                                </div> --}}
                                                <div class="checkout-form-group">
                                                    <label class="checkout-label">Email *</label>
                                                    <input type="email" class="checkout-input" name="email"
                                                        value="{{ Auth::user()->email ?? '' }}" style="color: #333"
                                                        required>
                                                </div>
                                                <div class="checkout-form-group">
                                                    <label class="checkout-label">Address *</label>
                                                    <input type="text" class="checkout-input" id="location" name="address"
                                                        value="{{ Auth::user()->address_line ?? '' }}" style="color: #333"
                                                        required>
                                                </div>
                                                <div class="checkout-form-group">
                                                    <label class="checkout-label">Address 2 (Optional)</label>
                                                    <input type="text" class="checkout-input" name="address2">
                                                </div>
                                                <div class="checkout-form-group checkout-col-2">
                                                    <label class="checkout-label">City *</label>
                                                    <input type="text" class="checkout-input" name="city"
                                                        value="{{ Auth::user()->city ?? '' }}" style="color: #333" required>
                                                </div>
                                                <div class="checkout-form-group checkout-col-2">
                                                    <label class="checkout-label">State *</label>
                                                    <input type="text" class="checkout-input" name="state"
                                                        value="{{ Auth::user()->state ?? '' }}" style="color: #333" required>
                                                </div>
                                                <div class="checkout-form-group checkout-col-2">
                                                    <label class="checkout-label">ZIP Code *</label>
                                                    <input type="text" class="checkout-input" name="zip"
                                                        value="{{ Auth::user()->zip ?? '' }}" style="color: #333" required>
                                                </div>
                                                <div class="checkout-form-group checkout-col-2">
                                                    <label class="checkout-label">Country *</label>
                                                    <input type="text" class="checkout-input" name="country"
                                                        value="{{ Auth::user()->country ?? '' }}" style="color: #333" required>
                                                </div>
                                                <div class="checkout-form-group">
                                                    <label class="checkout-label">Phone Number *</label>
                                                    <input type="tel" class="checkout-input" name="phone"
                                                        value="{{ Auth::user()->phone ?? '' }}" style="color: #333"
                                                        required>
                                                </div>
                                                <div class="checkout-form-group checkout-col-2">
                                                    <label for="order-note" class="checkout-label">Order Note
                                                        (Optional)</label>
                                                    <textarea name="note" class="checkout-input" style="color: #333; min-height: 100px;"
                                                        placeholder="Write any special instructions or notes"></textarea>
                                                </div>

                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Order Review -->
                                    <section class="checkout-section">
                                        <h2 class="checkout-section-title">
                                            <i class="fas fa-clipboard-check checkout-section-icon"></i>
                                            ORDER REVIEW
                                        </h2>

                                        <div class="checkout-review-items">
                                            @foreach ($cartItems as $item)
                                                <div class="checkout-review-item">
                                                    <div class="checkout-review-product">
                                                        <img src="{{ asset($item->options->image) }}"
                                                            alt="{{ $item->name }}" class="checkout-review-img">
                                                        <div>
                                                            <h4 class="checkout-review-name">{{ $item->name }}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="checkout-review-qty">{{ $item->qty }}</div>
                                                    <div class="checkout-review-price">
                                                        ${{ number_format($item->price * $item->qty, 2) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="checkout-review-subtotal"
                                                style="margin-top: 15px; display: flex; justify-content: space-between; font-weight: bold; border-top: 1px solid #ccc; padding-top: 10px;">
                                                <span>Total</span>
                                                <span>${{ $cartTotal, 2 }}</span>
                                            </div>
                                        </div>


                                        <button type="submit" class="checkout-submit-btn">
                                            PLACE ORDER <i class="fas fa-lock"></i>
                                        </button>
                                        <div class="view-cart-continue-shopping">
                                            <a href="{{ route('cart.index') }}" class="view-cart-continue-link"><i
                                                    class="fas fa-chevron-left"></i>
                                                BACK TO CART</a>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.login_form_wrapper-->
        </div>
    @endsection
