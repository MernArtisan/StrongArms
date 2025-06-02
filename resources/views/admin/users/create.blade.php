@extends('admin.layout.layout')
@section('title', 'Add User')
@section('content')

    <div class="main-content">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create User</h4>
                        </div>

                        <div class="card-body">

                            <form id="userForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Role -->
                                    <div class="form-group col-md-6">
                                        <label>Role</label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="">Select</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Name -->
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone">
                                    </div>

                                    <!-- Country -->
                                    <div class="form-group col-md-4">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" id="country">
                                    </div>

                                    <!-- State -->
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" id="state">
                                    </div>

                                    <!-- City -->
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" id="city">
                                    </div>

                                    <!-- Zip -->
                                    <div class="form-group col-md-4">
                                        <label>Zip</label>
                                        <input type="text" name="zip" class="form-control" id="zip">
                                    </div>

                                    <!-- Website -->
                                    <div class="form-group col-md-4">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" id="website">
                                    </div>

                                    <!-- Company -->
                                    <div class="form-group col-md-4">
                                        <label>Company</label>
                                        <input type="text" name="company_name" class="form-control" id="company_name">
                                    </div>

                                    <!-- Gender -->
                                    <div class="form-group col-md-4">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <!-- Address -->
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" name="address_line" class="form-control" id="address_line">
                                    </div>

                                    <!-- Image -->
                                    <!-- Image -->
                                    <div class="form-group col-md-6">
                                        <label for="image">Profile Image</label>
                                        <input type="file" name="image" class="form-control" id="imageInput"
                                            accept="image/*">
                                    </div>

                                    <div class="form-group col-md-6" id="previewContainer" style="display: none;">
                                        <label>Image Preview:</label>
                                        <img id="previewImage" style="max-height: 100px; display: block;"
                                            alt="Image Preview">
                                    </div>

                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success" id="submitBtn">Create User</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('previewImage');
            const container = document.getElementById('previewContainer');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    container.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                container.style.display = 'none';
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize form validation
            $("#userForm").validate({
                rules: {
                    role: "required",
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    gender: "required",
                    country: "required",
                    state: "required",
                    city: "required"
                },
                messages: {
                    name: "Please enter the user's name",
                    email: "Please enter a valid email address",
                    password: "Password must be at least 8 characters long",
                    gender: "Please select gender",
                    country: "Please enter country",
                    state: "Please enter state",
                    city: "Please enter city"
                },
                submitHandler: function(form) {
                    // Disable the submit button to prevent double submission
                    $('#submitBtn').prop('disabled', true).text('Submitting...');

                    // Submit the form using AJAX
                    var formData = new FormData(form);

                    $.ajax({
                        url: "{{ route('all-users.store') }}",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {

                                toastr.success(response.message);

                                setTimeout(() => {
                                    window.location.href =
                                        "{{ route('all-users.index') }}";
                                }, 2000);

                            } else {

                                toastr.error(response.message);
                            }
                            $('#submitBtn').prop('disabled', false).text('Create User');
                        },
                        error: function(xhr, status, error) {
                            alert('Something went wrong. Please try again.');
                            $('#submitBtn').prop('disabled', false).text('Create User');
                        }
                    });
                }
            });
        });
    </script>
@endsection
