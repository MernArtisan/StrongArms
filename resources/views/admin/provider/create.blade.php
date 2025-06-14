@extends('admin.layout.layout')
@section('title', 'Add Trainer')

@section('content')
    <div class="main-content">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Trainer</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('provider.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role" value="provider">

                                <div class="text-center mb-4">
                                    <label for="logoInput" class="d-block">
                                        <div id="logoPreview" class="logo-upload border rounded-circle bg-light"
                                            style="width: 100px; height: 100px; margin: auto; display: flex; align-items: center; justify-content: center;">
                                            LOGO
                                        </div>
                                        <input type="file" id="logoInput" name="logo" accept="image/*" class="d-none">
                                    </label>
                                    <button type="button" onclick="$('#logoInput').click()"
                                        class="btn btn-outline-secondary btn-sm mt-2">
                                        Upload Logo <i class="fas fa-upload"></i>
                                    </button>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label>Store Name</label>
                                        <input type="text" name="store_name" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Store Location</label>
                                        <input type="text" name="store_location" class="form-control">
                                        <input type="hidden" name="latitude" id="latitude">
                                        <input type="hidden" name="longitude" id="longitude">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Established Since</label>
                                        <input type="text" name="established_since" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label> Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>ZIP Code</label>
                                        <input type="text" name="zip" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>State</label>
                                        <select name="state" class="form-control" required>
                                            <option value="">Select State</option>
                                            <option value="California">California</option>
                                            <option value="New York">New York</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <select name="city" class="form-control" required>
                                            <option value="">Select City</option>
                                            <option value="Los Angeles">Los Angeles</option>
                                            <option value="New York City">New York City</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Store Description</label>
                                        <textarea name="store_description" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus"></i> Register Trainer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
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
            initGoogleAutocomplete();

            $('#logoInput').on('change', function(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    $('#logoPreview').html(
                        `<img src="${reader.result}" alt="Logo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`
                    );
                };
                reader.readAsDataURL(event.target.files[0]);
            });
        });
    </script>
@endsection
