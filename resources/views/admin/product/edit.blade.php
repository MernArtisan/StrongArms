@extends('admin.layout.layout')
@section('title', 'Edit Product')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Product</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4>Edit Product</h4>
              <a href="{{ route('product.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
            </div>

            <div class="card-body">
              <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                @method('PATCH')
                <div class="row">

                  <div class="form-group col-md-6">
                    <label>Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Discounted Price</label>
                    <input type="text" name="cut_price" class="form-control" value="{{ $product->cut_price }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Discount Off (%)</label>
                    <input type="text" name="off" class="form-control" value="{{ $product->off }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                      <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option value="">-- Select Category --</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                          {{ $category->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-lg-6"></div>

                  <div class="form-group col-lg-6">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control summernote">{{ $product->description }}</textarea>
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Specification</label>
                    <textarea name="specification" class="form-control summernote">{{ $product->specification }}</textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Upload More Images</label>
                    <input type="file" name="image[]" id="image" multiple class="form-control-file">
                    <div id="image-preview" class="mt-2 d-flex flex-wrap"></div>
                    <div class="mt-2">
                      @foreach($product->images as $img)
                        <img src="{{ asset($img->image) }}" width="100" class="img-thumbnail m-1">
                      @endforeach
                    </div>
                  </div>

                </div>

                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Update Product</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  // Preview Multiple Images
  document.getElementById('image').addEventListener('change', function () {
    const preview = document.getElementById('image-preview');
    preview.innerHTML = '';
    const files = this.files;
    [...files].forEach(file => {
      const reader = new FileReader();
      reader.onload = function (e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.className = 'img-thumbnail m-1';
        img.style.width = '120px';
        img.style.height = '120px';
        preview.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  });

</script>
@endsection
