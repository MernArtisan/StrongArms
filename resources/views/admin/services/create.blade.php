@extends('admin.layout.layout')
@section('title', 'Add Service')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Service</h1>
                <div class="ml-auto">
                    <a href="{{ route('service.index') }}" class="btn btn-dark">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Service Form</h4>
                            </div>

                            <div class="card-body">
                                <form id="serviceForm" action="{{ route('service.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Service Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                       
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control"
                                            value="{{ old('price') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <input type="text" name="type" class="form-control"
                                            value="{{ old('type') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                    
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save Service</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#serviceForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png|webp"
                    },
                    price: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                },
                messages: {
                    name: "Please enter service name",
                    description: "Please enter a description",
                    image: "Please upload a valid image",
                    price: "Please enter the price",
                    type: "Please enter the service type",
                    status: "Please select a status",
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
