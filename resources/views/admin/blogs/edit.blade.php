@extends('admin.layout.layout')
@section('title', 'Edit Blog')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="page-title m-b-0">Edit Blog</h4>
                            <a href="{{ route('blogs-upload.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back To List</a>
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
                            <form action="{{ route('blogs-upload.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="container mt-4">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea name="content" id="content" rows="5" class="form-control summernote" required>{{ old('content', $blog->content) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @if ($blog->image)
                                        <img src="{{ asset($blog->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Blog</button>
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
