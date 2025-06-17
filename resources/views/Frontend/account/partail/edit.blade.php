@extends('Frontend.account.myprofile')

@section('profile-content')
    <style>
        /* Your existing styles here, unchanged */
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

        /* edit-profile styles */
        :root {
            --edit-profile-red: #d32f2f;
            --edit-profile-dark: #1a1a1a;
            --edit-profile-gray: #2d2d2d;
            --edit-profile-light: #f5f5f5;
        }

        .edit-profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .edit-profile-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            background: white;
            margin-bottom: 30px;
        }

        .edit-profile-header {
            background: linear-gradient(135deg, var(--edit-profile-dark), var(--edit-profile-gray));
            color: white;
            padding: 25px;
            position: relative;
        }

        .edit-profile-avatar-container {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            position: relative;
        }

        .edit-profile-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid var(--edit-profile-red);
            object-fit: cover;
            background-color: white;
            padding: 5px;
        }

        .edit-profile-avatar-upload {
            display: none;
        }

        .edit-profile-section {
            padding: 25px;
            border-bottom: 1px solid #eee;
        }

        .edit-profile-section:last-child {
            border-bottom: none;
        }

        .edit-profile-section-title {
            color: #878244;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            font-weight: 600;
        }

        .edit-profile-section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .edit-profile-form-group {
            margin-bottom: 20px;
        }

        .edit-profile-label {
            font-weight: 600;
            color: #fff;
            margin-bottom: 8px;
            display: block;
        }

        .edit-profile-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s;
            color: #1a1a1a;
        }

        .edit-profile-input:focus {
            border-color: var(--edit-profile-red);
            box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.1);
            outline: none;
        }

        .edit-profile-photo-change {
            text-align: center;
            margin-top: 20px;
        }

        .edit-profile-photo-change-btn {
            background: var(--edit-profile-red);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            width: 100%;
            justify-content: center;
        }

        .edit-profile-photo-change-btn:hover {
            background: var(--edit-profile-dark);
            transform: translateY(-2px);
        }

        .edit-profile-photo-change-btn i {
            margin-right: 5px;
        }

        .edit-profile-btn {
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .edit-profile-btn-primary {
            background: var(--edit-profile-red);
            color: white;
            border: none;
        }

        .edit-profile-btn-primary:hover {
            background: var(--edit-profile-dark);
            transform: translateY(-2px);
        }

        .edit-profile-btn-outline {
            background: transparent;
            border: 1px solid var(--edit-profile-gray);
            color: #bbbbbb;
        }

        .edit-profile-btn-outline:hover {
            border-color: var(--edit-profile-red);
            color: var(--edit-profile-red);
        }

        .edit-profile-btn i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .edit-profile-avatar-container {
                width: 120px;
                height: 120px;
            }
        }

        .secur-h label {
            color: #d3cbcb;
        }
    </style>

    <div class="col-lg-8">
        <form id="editProfileForm" action="{{ route('account.editprofile') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="edit-profile-section">
                <h5 class="edit-profile-section-title">
                    <i class="fas fa-id-card"></i> Personal Information
                </h5>

                <div class="row">
                    <div class="col-md-6 edit-profile-form-group">
                        <label class="edit-profile-label">Full Name</label>
                        <input type="text" name="name" class="edit-profile-input"
                            value="{{ old('name', auth()->user()->name) }}" required>
                    </div>
                    <div class="col-md-6 edit-profile-form-group">
                        <label class="edit-profile-label">Country</label>
                        <input type="text" name="country" class="edit-profile-input"
                            value="{{ old('country', auth()->user()->country) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 edit-profile-form-group">
                        <label class="edit-profile-label">Contact Email</label>
                        <input type="email" name="email" class="edit-profile-input"
                            value="{{ old('email', auth()->user()->email) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 edit-profile-form-group">
                        <label class="edit-profile-label">Phone Number</label>
                        <input type="tel" name="phone" class="edit-profile-input"
                            value="{{ old('phone', auth()->user()->phone) }}">
                    </div>
                    <div class="col-md-6 edit-profile-form-group">
                        <label class="edit-profile-label">Address</label>
                        <input type="text" name="address" class="edit-profile-input"
                            value="{{ old('address', auth()->user()->address_line ?? '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 edit-profile-photo-change">
                        <label for="avatarUpload" class="edit-profile-photo-change-btn">
                            <i class="fas fa-camera"></i> Change Photo
                            <input type="file" id="avatarUpload" name="profile_picture" accept="image/*" hidden>
                        </label>

                        @if (auth()->user()->image)
                            <div class="text-center mt-3">
                                <img src="{{ asset(auth()->user()->image) }}" alt="Current Profile Picture"
                                    class="edit-profile-avatar" style="width: 120px; height: 120px;">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="edit-profile-section text-end mt-4">
                    <a href="{{ url()->previous() }}" class="edit-profile-btn edit-profile-btn-outline me-3">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="edit-profile-btn edit-profile-btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
