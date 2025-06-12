@extends('Frontend.layout.layout')
@section('title', 'ThankYou')

@section('content')
    <style>
        :root {
            --thankyou-red: #d32f2f;
            --thankyou-dark: #1a1a1a;
            --thankyou-gray: #2d2d2d;
            --thankyou-light: #f5f5f5;
        }

        .thankyou-container {
            max-width: 800px;
            padding: 30px;
        }

        .thankyou-card {
            background: #0c0a0a;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 50px;
            position: relative;
            overflow: hidden;
        }

        .thankyou-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #878244, var(--thankyou-dark));
        }

        .thankyou-icon {
            width: 100px;
            height: 100px;
            background: var(--thankyou-red);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 25px;
            animation: thankyouBounce 1s;
        }

        @keyframes thankyouBounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }

        .thankyou-title span {
            color: var(--thankyou-red);
        }

        .thankyou-subtitle {
            color: var(--thankyou-gray);
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .thankyou-order-info {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
        }

        .thankyou-order-id {
            font-weight: 600;
            color: #878244;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .thankyou-order-date {
            color: var(--thankyou-gray);
            margin-bottom: 15px;
        }

        .thankyou-order-amount {
            font-weight: 700;
            font-size: 1.3rem;
            color: #000;
        }

        .thankyou-details {
            margin: 30px 0;
            text-align: left;
        }

        .thankyou-details-card {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
        }

        .thankyou-details-title {
            color: #878244;
            margin-bottom: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .thankyou-details-title i {
            margin-right: 10px;
        }

        .thankyou-details-content {
            line-height: 1.6;
        }

        .thankyou-btn i {
            margin-right: 8px;
        }

        .thankyou-note {
            margin-top: 30px;
            font-size: 0.9rem;
            color: var(--thankyou-gray);
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        @media (max-width: 768px) {
            .thankyou-card {
                padding: 30px;
            }

            .thankyou-details {
                grid-template-columns: 1fr;
            }

            .thankyou-title {
                font-size: 1.8rem;
            }
        }

        h2.thankyou-title {
            color: #fff;
            font-size: 29px;
        }

        .thankyou-details-content p {
            color: #000;
        }

        .thankyou-btn-group {
            text-align: center;
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
                            <h2>Thank You</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">Thank You</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->

    <div class="container thankyou-container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 thankyou-card">
                <div class="section-heading">
                    <div class="thankyou-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h2 class="thankyou-title">THANK YOU <span>FOR BOOKING WITH US</span></h2>
                    <p>Your tactical gear is being prepared for shipment</p>
                </div>
                {{-- <div class="thankyou-order-info">
                    <div class="thankyou-order-id">Order #TAC-789456</div>
                    <div class="thankyou-order-date">Placed on June 15, 2025 at 2:45 PM</div>
                    <div class="thankyou-order-amount">Total: $1,691.70</div>
                </div> --}}
                {{-- <div class="thankyou-details">
                    <div class="thankyou-details-card">
                        <h3 class="thankyou-details-title">
                            <i class="fas fa-truck"></i> Delivery Info
                        </h3>
                        <div class="thankyou-details-content">
                            <p><strong>Shipping to FFL Dealer:</strong></p>
                            <p>Continental Arms<br>
                                200 Tactical Lane<br>
                                New York, NY 10001</p>
                            <p class="mt-3"><strong>Estimated Delivery:</strong><br>
                                June 22, 2025</p>
                        </div>
                    </div>
                </div> --}}
                <div class="thankyou-btn-group">
                    <!-- <a href="#" class="thankyou-btn thankyou-btn-primary">
                            <i class="fas fa-clipboard-list"></i> View Order Details
                        </a> -->
                    <a href="{{ route('services.index') }}" class="btn1">
                        <i class="fas fa-home"></i> Back to Shopping
                    </a>
                </div>

                <div class="thankyou-note">
                    <p><strong>Note:</strong> Firearm purchases require shipment to a licensed FFL dealer. You will receive
                        an email with tracking information once your order ships. For ammunition purchases, adult signature
                        (21+) is required upon delivery.</p>
                </div>
            </div>
            <!----my-code------>

            <!----my-code------>
        </div>

    </div>


@endsection
