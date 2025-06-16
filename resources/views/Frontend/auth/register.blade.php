@extends('frontend.layout.layout')
@section('title', 'Home')
@section('content')
<style>
    body {
        background-color: #070606;
    }
    .register-section {
        padding: 80px 0;
        color: #fff;
    }
    .register-box {
        background-color: #212529;
        padding: 40px;
        border-radius: 6px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        color: #fff;
    }
    .info-box {
        background-color: #212529;
        padding: 40px;
        border-radius: 6px;
        height: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        color: #fff;
    }
    .register-box h2 {
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }
    .form-control {
        background-color: #eaf0fb;
        border: 1px solid #ddd;
        height: 48px;
    }
    .btn-black {
        background-color: #878244;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        width: 100%;
        padding: 12px;
        border: none;
        transition: none;
    }
    .btn-black:hover {
        background-color: #878244 !important;
        color: #fff !important;
        cursor: default;
    }

    
</style>

    <!--Breadcumb area start here-->
    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>register</h2>
                            <ul>
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="javascript:void(0)">register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
	<!--register area start here-->
	<div class="register_section">
        <section class="register-section">
            <div class="container">
                <div class="row justify-content-center align-items-center g-4">
                    <!-- Register Form -->
                    <div class="col-lg-6">
                        <div class="register-box">
                            <h2 class="text-center">Create Account</h2>
                            <p class="text-center text-muted mb-4" style="color: #fff !important">Register to access dashboard and orders.</p>
                            <form action="{{ route('register.submit') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Username *" value="{{ old('name')}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email *" value="{{ old('email')}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" placeholder="Password *"  required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password *" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone')}}" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{ old('company_name')}}" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="website" class="form-control" placeholder="Website" value="{{ old('website')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="address_line" class="form-control" placeholder="Address Line" value="{{ old('address_line')}}">
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I agree to the <a href="#">Terms and Conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-black">Register</button>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <p>Already a member? <a href="{{ route('login') }}">Login Here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
        
                    <!-- Right Info Box -->
                    <div class="col-lg-5">
                        <div class="info-box text-center">
                            <h5 class="fw-bold">Why Create an Account?</h5>
                            <p class="text-muted " style="color: #fff !important">
                                Join as a certified trainer to offer your expertise to clients, manage training sessions, and grow your business with our powerful dashboard. Enjoy access to exclusive trainer tools insights.

                            </p>
                            <a href="{{ route('register.trainer') }}" class="btn btn-black mt-3">Create A Trainer Account Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>	
     </div>

@endsection