@extends('admin.layout.layout')
@section('title', 'Add Product')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Create Home Banners</h4>
                                <a href="{{ route('homebanner.index') }}" class="btn btn-dark"><i
                                        class="fas fa-arrow-left"></i> Back To List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('homebanner.store') }}" method="POST" enctype="multipart/form-data"
                                    onsubmit="return validateForm();">
                                    @csrf
                                    <!-- Title Field -->
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter title">
                                        <small id="titleError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <!-- Description Field (with editor) -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control summernote" placeholder="Enter description"></textarea>
                                        <small id="descriptionError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <!-- Redirect URL Field -->
                                    <div class="form-group">
                                        <label for="redirect_url">Redirect URL</label>
                                        <input type="text" id="redirect_url" name="redirect_url" class="form-control"
                                            placeholder="Enter redirect URL">
                                        <small id="redirect_urlError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <div class="form-group">
                                        <label for="imageUploader">Upload Image</label>

                                        <!-- Image preview with styling -->
                                        <div id="imagePreview" class="mb-2" style="display: none;">
                                            <img src="" alt="Image Preview" id="previewImage"
                                                style="width: 100px; height: 100px; border-radius: 20px; object-fit: cover; box-shadow: 0px 4px 8px rgba(0,0,0,0.1);">
                                        </div>

                                        <!-- File Input with buttons -->
                                        <div class="d-flex">
                                            <!-- Select Button -->
                                            <button type="button" class="btn btn-dark" id="selectBtn"
                                                onclick="document.getElementById('imageUploader').click();">
                                                Select Image
                                            </button>

                                            <!-- Remove Button -->
                                            <button type="button" class="btn btn-danger ml-2" id="removeBtn"
                                                style="display: none;" onclick="removeImage();">
                                                Remove Image
                                            </button>
                                        </div>

                                        <!-- Hidden file input -->
                                        <input type="file" name="image" id="imageUploader" class="form-control-file"
                                            accept="image/*" style="display: none;" onchange="previewFile();">

                                        <small id="imageError" class="text-danger"></small>
                                    </div>

                                    <!-- Status Field -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <small id="statusError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        // Image preview logic
        function previewFile() {
            const fileInput = document.getElementById('imageUploader');
            const previewContainer = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const removeBtn = document.getElementById('removeBtn');

            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                    removeBtn.style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const fileInput = document.getElementById('imageUploader');
            const previewContainer = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const removeBtn = document.getElementById('removeBtn');

            fileInput.value = '';
            previewImage.src = '';
            previewContainer.style.display = 'none';
            removeBtn.style.display = 'none';
        }

        // Form validation
        function validateForm() {
            clearErrors();
            let isValid = true;

            const title = document.getElementById('title').value.trim();
            const description = document.getElementById('description').value.trim();
            const image = document.getElementById('imageUploader').value;
            const status = document.getElementById('status').value;

            if (title === '') {
                document.getElementById('titleError').innerText = 'Please enter a title.';
                isValid = false;
            }

            if (description === '') {
                document.getElementById('descriptionError').innerText = 'Please enter a description.';
                isValid = false;
            }

            if (image === '') {
                document.getElementById('imageError').innerText = 'Please select an image to upload.';
                isValid = false;
            }

            if (status === '') {
                document.getElementById('statusError').innerText = 'Please select a status.';
                isValid = false;
            }

            return isValid;
        }

        function clearErrors() {
            document.getElementById('titleError').innerText = '';
            document.getElementById('descriptionError').innerText = '';
            document.getElementById('imageError').innerText = '';
            document.getElementById('statusError').innerText = '';
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('title').addEventListener('input', function() {
                document.getElementById('titleError').innerText = '';
            });

            document.getElementById('description').addEventListener('input', function() {
                document.getElementById('descriptionError').innerText = '';
            });

            document.getElementById('imageUploader').addEventListener('change', function() {
                document.getElementById('imageError').innerText = '';
                previewFile(); // Show preview on file change
            });

            document.getElementById('status').addEventListener('change', function() {
                document.getElementById('statusError').innerText = '';
            });
        });
    </script>
@endsection
