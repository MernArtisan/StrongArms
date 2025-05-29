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
                            <h4 class="page-title m-b-0">Edit Home Banner</h4>
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
                            <form action="{{ route('homebanner.update', $homeBanner->id) }}" method="POST"
                                enctype="multipart/form-data" onsubmit="return validateForm();">
                                @csrf
                                @method('PUT') <!-- Use PUT method for updating -->

                                <!-- Title Field -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $homeBanner->title }}" placeholder="Enter title">
                                    <small id="titleError" class="text-danger"></small>
                                </div>

                                <!-- Description Field (with editor) -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control summernote" placeholder="Enter description">{{ $homeBanner->description }}</textarea>
                                    <small id="descriptionError" class="text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="description">Redirect URL</label>
                                   <input type="url" id="redirect_url" name="redirect_url" class="form-control" value="{{ $homeBanner->redirect_url }}" placeholder="Enter redirect url">
                                    <small id="descriptionError" class="text-danger"></small>
                                </div>


                                <!-- Image Field -->
                                <div class="form-group">
                                    <label for="imageUploader">Upload Image</label>

                                    <div id="imagePreview" class="mb-2">
                                        @if ($homeBanner->image)
                                            <img src="{{ asset('uploads/homebanners/' . $homeBanner->image) }}"
                                                alt="Image Preview" id="previewImage"
                                                style="width: 150px; height: 150px; border-radius: 15px; object-fit: cover;">
                                        @endif
                                    </div>

                                    <div class="d-flex">
                                        <button type="button" class="btn btn-dark" id="selectBtn"
                                            onclick="document.getElementById('imageUploader').click();">
                                            Select Image
                                        </button>
                                        <button type="button" class="btn btn-danger ml-2" id="removeBtn"
                                            style="display: none;" onclick="removeImage();">
                                            Remove Image
                                        </button>
                                    </div>

                                    <input type="file" name="image" id="imageUploader" class="form-control-file"
                                        accept="image/*" style="display: none;" onchange="previewFile();">
                                    <small id="imageError" class="text-danger"></small>
                                </div>

                                <!-- Status Field -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ $homeBanner->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $homeBanner->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    <small id="statusError" class="text-danger"></small>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

</script>
@endsection