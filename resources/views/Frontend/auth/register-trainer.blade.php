@extends('Frontend.layout.layout')
@section('title', 'Home')
@section('content')
    <style>
        body {
            background-color: #000000;
        }

        .vendor-register {
            padding: 60px 0;
        }

        .form-box {
            background-color: #212529;
            padding: 40px;
            border-radius: 8px;
            max-width: 800px;
            color: #fff;
            margin: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .form-control,
        select {
            height: 45px;
            border-radius: 4px;
            background-color: #212529;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ccc;
        }

        .btn-black {
            background: #000;
            color: #fff;
            padding: 12px;
            text-transform: uppercase;
            font-weight: bold;
            width: 100%;
            border: none;
        }

        .btn-black i {
            margin-right: 6px;
        }

        .logo-upload {
            width: 100px;
            height: 100px;
            background-color: #eee;
            border-radius: 50%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #666;
            margin-bottom: 10px;
        }

        input.form-control {
            color: white;
        }

        label.error {
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
    </style>

    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content text-center">
                            <h2>Register</h2>
                            <ul class="list-inline">
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="register_section">
        <section class="vendor-register">
            <div class="container">
                <div class="form-box">
                    <h2 class="text-center fw-bold">Register As A Trainer</h2>
                    <p class="text-center text-muted mb-4" style="color: #fff !important">
                        Join as a certified trainer to offer your expertise to clients, manage training sessions, and grow
                        your business with our powerful dashboard.
                    </p>

                    <form id="trainerRegisterForm" action="{{ route('registertrainer.submit') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mb-3">
                            <label for="logoInput" class="d-block">
                                <div id="logoPreview" class="logo-upload" style="cursor: pointer;">
                                    LOGO
                                </div>
                                <input type="file" id="logoInput" name="logo" accept="image/*" class="d-none">
                            </label>
                            <button type="button" onclick="$('#logoInput').click()" class="btn btn-outline-primary btn-sm">
                                Add Logo <i class="fas fa-upload"></i>
                            </button>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="store_name" value="{{ old('store_name') }}"
                                    placeholder="Store Name">
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="autocomplete" name="store_location"
                                    value="{{ old('store_location') }}" placeholder="Store Location">
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                                <input type="hidden" name="role" id="role" value="provider">
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="established_since"
                                    value="{{ old('established_since') }}" placeholder="Established Since (Year)">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="owner_name" value="{{ old('owner_name') }}"
                                    placeholder="Your Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Email Address">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                    placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip" value="{{ old('zip') }}"
                                    placeholder="ZIP Code">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" placeholder="United States">
                            </div>
                            <div class="col-md-6">
                                <select name="state" class="form-control">
                                    <option value="">Select State</option>
                                    <option>California</option>
                                    <option>New York</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="city" class="form-control">
                                    <option value="">Select City</option>
                                    <option>Los Angeles</option>
                                    <option>New York City</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="store_description" class="form-control" rows="3" placeholder="Store Description"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-black">
                                    <i class="fas fa-store"></i> Register Store
                                </button>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted" style="color: #fff !important">By registering, you agree to our <a
                                    href="#">Terms</a> and <a href="#">Privacy Policy</a>.</small><br>
                            <small class="text-muted" style="color: #fff !important">Already have an account? <a
                                    href="{{ route('login') }}">Login here.</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2zcZWYTrnjovVYwCR9zwHJwVEtUEufJk&libraries=places">
    </script>

    <script>
        function initGoogleAutocomplete() {
            const input = document.getElementById('autocomplete');
            if (!input) return;

            const autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode'],
                componentRestrictions: {
                    country: "us"
                }
            });

            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (place.geometry) {
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                }
            });
        }

        $(document).ready(function() {
            // 1. Initialize Autocomplete first time
            initGoogleAutocomplete();

            // 2. Force reinitialize if page was loaded from cache (back button issue)
            $(window).on('pageshow', function(event) {
                if (event.originalEvent.persisted || window.performance.navigation.type === 2) {
                    initGoogleAutocomplete();
                }
            });

            // Logo preview
            $('#logoInput').on('change', function(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    $('#logoPreview').html(
                        `<img src="${reader.result}" alt="Logo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`
                    );
                };
                reader.readAsDataURL(event.target.files[0]);
            });

            // jQuery Validation
            $('#trainerRegisterForm').validate({
                rules: {
                    store_name: "required",
                    store_location: "required",
                    established_since: "required",
                    owner_name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "[name='password']"
                    },
                    phone: "required",
                    zip: "required",
                    country: "required",
                    state: "required",
                    city: "required",
                    store_description: "required"
                },
                messages: {
                    password_confirmation: {
                        equalTo: "Passwords do not match"
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid");
                }
            });
        });
    </script>

@endsection
