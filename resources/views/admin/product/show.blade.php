@extends('admin.layout.layout')
@section('title', 'Products')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Product: {{ $product->name ?? '' }}</h4>
                                <a href="{{ route('product.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">

                        <!-- Admin ke liye dono sections -->
                        <div class="col-6">
                            <div class="card mb-4 shadow-sm"> <!-- Added shadow for better depth -->
                                <div class="card-body">
                                    <h5 class="card-title mb-4">
                                        <i class="fas fa-info-circle"></i> <!-- Added icon -->
                                        Product Details
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        <!-- Name -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-tag mr-2"></i>Name:</strong></span>
                                            <span>{{ $product->name }}</span>
                                        </li>
                        
                                        <!-- Category -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-layer-group mr-2"></i>Category:</strong></span>
                                            <span>{{ $product->category->name }}</span>
                                        </li>
                        
                                        <!-- Price -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-dollar-sign mr-2"></i>Price:</strong></span>
                                            <span>${{ number_format($product->price, 2) }}</span>
                                        </li>
                        
                                        <!-- Quantity -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-boxes mr-2"></i>Quantity:</strong></span>
                                            <span>{{ $product->quantity }}</span>
                                        </li>
                                        
                        
                                        <!-- Status -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-check-circle mr-2"></i>Status:</strong></span>
                                            <span class="badge {{ $product->status ? 'badge-success' : 'badge-danger' }}">
                                                {{ $product->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </li>
                        
                                        <!-- Created Date -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-calendar-alt mr-2"></i>Created Date:</strong></span>
                                            <span>{{ $product->created_at->format('Y-m-d') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body" style="height: 401px">
                                <h5 class="card-title">Description</h5>
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Images</h5>
                                <div id="productImagesCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $index => $image)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($image->image) }}"
                                                    class="d-block w-100 img-fluid rounded" alt="Product Image"
                                                    style="height: 326px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#productImagesCarousel" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#productImagesCarousel" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <style>
                                        .carousel-control-prev-icon,
                                        .carousel-control-next-icon {
                                            background-color: black;
                                            border-radius: 50%;
                                            width: 40px;
                                            height: 40px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection
