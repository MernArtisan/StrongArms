@extends('admin.layout.layout')
@section('title', 'Add Blog')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Create Blog </h4>
                                <a href="{{ route('blogs-upload.index') }}" class="btn btn-dark"><i
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
                                <form action="{{ route('blogs-upload.store') }}" method="POST"
                                    enctype="multipart/form-data" class="container mt-4">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea name="content" id="content" rows="5" class="form-control summernote" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            accept="image/*">
                                        <img id="imagePreview" src="#" alt="Image Preview"
                                            style="display:none; margin-top:10px; max-width: 100px; max-height: 100px;" />
                                    </div>



                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Submit Blog</button>
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
        document.getElementById('image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('imagePreview');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>

@endsection
