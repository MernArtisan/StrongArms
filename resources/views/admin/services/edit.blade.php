@extends('admin.layout.layout')
@section('title', 'Edit Service')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Service</h1>
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
            <div class="card-header"><h4>Update Service</h4></div>

            <div class="card-body">
              <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label>Service Name</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}" required>
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control" rows="3" required>{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="form-group">
                  <label>Current Image</label><br>
                  @if ($service->image)
                    <img src="{{ asset($service->image) }}" width="100" class="mb-2">
                  @else
                    <p>No image uploaded.</p>
                  @endif
                </div>

                <div class="form-group">
                  <label>Change Image</label>
                  <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="price" class="form-control" value="{{ old('price', $service->price) }}" required>
                </div>

                <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="type" class="form-control" value="{{ old('type', $service->type) }}" required>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control" required>
                    <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Update Service</button>
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
