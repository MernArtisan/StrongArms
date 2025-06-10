@extends('Frontend.account.myprofile')

@section('profile-content')
    <style>
        :root {
            --account-order-red: #d32f2f;
            --account-order-dark: #1a1a1a;
            --account-order-gray: #2d2d2d;
            --account-order-light: #f5f5f5;
        }

        .my-main-cont {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .account-order-profile-header {
            background: linear-gradient(135deg, var(--account-order-dark), var(--account-order-gray));
            color: white;
            padding: 30px;
            border-radius: 8px 8px 0 0;
        }

        .account-order-profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid var(--account-order-red);
            object-fit: cover;
        }

        .account-order-sidebar {
            background-color: white;
            border-radius: 8px;
            padding: 0;
            height: auto;
            overflow: hidden;

        }

        .account-order-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .account-order-sidebar-menu li {
            border-bottom: 1px solid #eee;
        }

        .account-order-sidebar-menu li:last-child {
            border-bottom: none;
        }

        .account-order-sidebar-menu a {
            display: block;
            padding: 15px 20px;
            color: var(--account-order-dark);
            text-decoration: none;
            transition: all 0.3s;
        }

        .account-order-sidebar-menu a:hover,
        .account-order-sidebar-menu a.account-order-active {
            background-color: #f8f9fa;
            color: var(--account-order-red);
            border-left: 4px solid var(--account-order-red);
        }

        .account-order-sidebar-menu i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }

        /******change-password********/
        :root {
            --change-password-red: #d32f2f;
            --change-password-dark: #1a1a1a;
            --change-password-gray: #2d2d2d;
            --change-password-light: #f5f5f5;
        }

        .change-password-body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .change-password-container {
            max-width: 600px;
            width: 100%;
            padding: 30px;
        }

        .change-password-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: white;
        }

        .change-password-header {
            background: linear-gradient(135deg, var(--change-password-dark), var(--change-password-gray));
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
        }

        .change-password-header h2 {
            margin-bottom: 0;
        }

        .change-password-header i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--change-password-red);
        }

        .change-password-body-inner {
            padding: 30px;
        }

        .change-password-form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .change-password-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #878244;
        }

        .change-password-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s;
            padding-right: 40px;
        }

        .change-password-input:focus {
            border-color: var(--change-password-red);
            box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.1);
            outline: none;
        }

        .change-password-toggle {
            position: absolute;
            right: 15px;
            top: 40px;
            color: var(--change-password-gray);
            cursor: pointer;
            transition: all 0.3s;
        }

        .change-password-toggle:hover {
            color: var(--change-password-red);
        }

        .change-password-strength {
            height: 5px;
            background: #eee;
            border-radius: 5px;
            margin-top: 10px;
            overflow: hidden;
        }

        .change-password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s;
        }

        .change-password-requirements {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .change-password-requirements h5 {
            color: #878244;
            margin-bottom: 15px;
        }

        .change-password-requirement {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #fff;
        }

        .change-password-requirement i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .change-password-requirement.valid {
            color: #4caf50;
        }

        .change-password-requirement.valid i {
            color: #4caf50;
        }

        .change-password-btn {
            width: 100%;
            padding: 14px;
            background: #878244;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: capitalize;
            -webkit-clip-path: polygon(12% 0%, 100% 0, 88% 100%, 0% 100%);
            clip-path: polygon(12% 0%, 100% 0, 88% 100%, 0% 100%);
        }

        .change-password-btn:hover {
            background: var(--change-password-dark);
            transform: translateY(-2px);
        }

        .change-password-btn i {
            margin-right: 10px;
        }

        @media (max-width: 576px) {
            .change-password-container {
                padding: 15px;
            }

            .change-password-body-inner {
                padding: 20px;
            }
        }

        /*****my-css****/
        .login_form_wrapper.change-pass {
            padding: 0px;
        }

        .section-heading.my-change-section {
            margin: 0px;
        }
    </style>


    <div class="col-lg-8">
        <div class="login_section">
            <div class="login_form_wrapper change-pass">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-sm-12">
                            <div class="section-heading my-change-section">
                                <h2>SECURE PASSWORD CHANGE</h2>
                                <p>Tactical Arms Account Security</p>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success" style="margin-top: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-top: 20px;">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="change-password-body-inner">
                        <form id="changePasswordForm" action="{{ route('account.changePassword') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="change-password-form-group">
                                <label class="change-password-label">Current Password</label>
                                <<input type="password" name="current_password" class="change-password-input"
                                    id="currentPassword" required style="color:#1a1a1a">
                                    <i class="fas fa-eye change-password-toggle"></i>
                            </div>

                            <div class="change-password-form-group">
                                <label class="change-password-label">New Password</label>
                                <input type="password" name="password" class="change-password-input" id="newPassword"
                                    required style="color:#1a1a1a">
                                <i class="fas fa-eye change-password-toggle"></i>
                                <div class="change-password-strength">
                                    <div class="change-password-strength-bar" id="passwordStrengthBar"></div>
                                </div>
                            </div>

                            <div class="change-password-form-group">
                                <label class="change-password-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="change-password-input"
                                    id="confirmPassword" required style="color:#1a1a1a">
                                <i class="fas fa-eye change-password-toggle"></i>
                            </div>

                            <div class="change-password-requirements">
                                <h5>Password Requirements:</h5>
                                <div class="change-password-requirement" id="reqLength">
                                    <i class="fas fa-circle"></i>
                                    <span>Minimum 8 characters</span>
                                </div>
                                <div class="change-password-requirement" id="reqUpper">
                                    <i class="fas fa-circle"></i>
                                    <span>At least one uppercase letter</span>
                                </div>
                                <div class="change-password-requirement" id="reqLower">
                                    <i class="fas fa-circle"></i>
                                    <span>At least one lowercase letter</span>
                                </div>
                                <div class="change-password-requirement" id="reqNumber">
                                    <i class="fas fa-circle"></i>
                                    <span>At least one number</span>
                                </div>
                                <div class="change-password-requirement" id="reqSpecial">
                                    <i class="fas fa-circle"></i>
                                    <span>At least one special character</span>
                                </div>
                            </div>

                            <button type="submit" class="change-password-btn">
                                <i class="fas fa-lock"></i> Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ session('error') }}",
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif
        </script>
    @endpush


@endsection
