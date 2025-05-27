
@extends('frontend.layout.layout')
@section('title', 'Home')
@section('content')
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Forget Password</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="login_section">
    <!-- login_form_wrapper -->
    <div class="login_form_wrapper">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12">
                <div class="section-heading">
                    <h2>Forget Password</h2>
                </div>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                  
                    <div class="login_wrapper">
                        
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </br>
                    </br>
                        <button type="submit" class="custom_btn btn-primary ">Send Reset Link</button>
                    </form>
                    @if (session('status'))
                        <p>{{ session('status') }}</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection