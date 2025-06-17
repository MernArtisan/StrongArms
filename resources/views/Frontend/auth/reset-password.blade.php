
@extends('Frontend.layout.layout')
@section('title', 'Home')
@section('content')
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Reset Password</h2>
                        
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
                    <h2>Reset Password</h2>
                </div>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                  
                    <div class="login_wrapper">
                        
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
    
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                            </div>
    
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                            </div>

                        </br>
    
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
