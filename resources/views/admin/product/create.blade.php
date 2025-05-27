@extends('admin.layout.layout')
@section('title', 'Add Product')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Add Product</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4>Create Product</h4>
              <a href="{{ route('product.index') }}" class="btn btn-dark">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>

            <div class="card-body">
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                <div class="row">

                  <!-- Product Name -->
                  <div class="form-group col-md-6">
                    <label>Product Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <small id="nameError" class="text-danger d-none">Product name is required</small>
                  </div>

                  <!-- Price -->
                  <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="number" name="price" id="price" class="form-control">
                    <small id="priceError" class="text-danger d-none">Valid price is required</small>
                  </div>

                  <!-- Cut Price -->
                  <div class="form-group col-md-6">
                    <label>Discounted Price</label>
                    <input type="text" name="cut_price" class="form-control">
                  </div>

                  <!-- Discount Off -->
                  <div class="form-group col-md-6">
                    <label>Discount Off (%)</label>
                    <input type="text" name="off" class="form-control">
                  </div>

                  <!-- Quantity -->
                  <div class="form-group col-md-6">
                    <label>Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control">
                    <small id="quantityError" class="text-danger d-none">Quantity is required</small>
                  </div>

                  <!-- Status -->
                  <div class="form-group col-md-6">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="active" selected>Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                  </div>

                  <!-- Category -->
                  <div class="form-group col-md-6">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option value="">-- Select Category --</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <small id="category_idError" class="text-danger d-none">Category is required</small>
                  </div>

                  <div class="form-group col-lg-6">
                    
                  </div>

                  <!-- Description -->
                  <div class="form-group col-lg-6">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control summernote" rows="3"></textarea>
                    <small id="descriptionError" class="text-danger d-none">Description is required</small>
                  </div>

                  <!-- Specification -->
                  <div class="form-group col-lg-6">
                    <label>Specification</label>
                    <textarea name="specification" class="form-control summernote" rows="2"></textarea>
                  </div>

                  <!-- Image -->
                  <div class="form-group col-md-12">
                    <label>Product Image</label>
                    <input type="file" name="image[]" id="image" multiple class="form-control-file">
                    <small id="imageError" class="text-danger d-none">At least one image is required</small>
                    <div id="image-preview" class="mt-2 d-flex flex-wrap"></div>
                  </div>

                </div>

                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Add Product</button>
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

  // Form Validation and AJAX
  document.getElementById('productForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = this;
    const submitBtn = form.querySelector('button[type="submit"]');
    let valid = true;

    const fields = ['name', 'price', 'quantity', 'category_id', 'description', 'image'];

    fields.forEach(id => {
      const field = document.getElementById(id);
      const error = document.getElementById(id + 'Error');
      const isFile = field?.type === 'file';
      const hasValue = isFile ? field.files.length > 0 : field?.value.trim().length > 0;

      if (!hasValue) {
        field?.classList.add('is-invalid');
        error?.classList.remove('d-none');
        valid = false;
      } else {
        field?.classList.remove('is-invalid');
        error?.classList.add('d-none');
      }
    });

    if (!valid) return;

    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Saving...';

    const formData = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Add Product';

      if (data.success) {
        toastr.success(data.message);
        form.reset();
        document.getElementById('image-preview').innerHTML = '';

        setTimeout(() => {
          window.location.href = '{{ route('product.index') }}';
        }, 2000);
      } else {
        toastr.error(data.message || 'Something went wrong!');
      }
    })
    .catch(error => {
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Add Product';
      toastr.error('Request failed!');
      console.error(error);
    });
  });
</script>
@endsection
