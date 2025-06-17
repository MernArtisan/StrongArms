@extends('admin.layout.layout')
@section('title', 'View Service')

@section('content')
    <style>
        img {
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.02);
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-0">Service: {{ $service->name ?? '' }}</h4>
                                <a href="{{ route('service.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Service Details -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <i class="fas fa-info-circle"></i> Service Details
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong><i class="fas fa-tag mr-1"></i> Name:</strong></span>
                                        <span>{{ $service->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong><i class="fas fa-tag mr-1"></i> Provider Name:</strong></span>
                                        <span>{{ $service->provider->store_name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong><i class="fas fa-dollar-sign mr-1"></i> Price:</strong></span>
                                        <span>${{ $service->price }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong><i class="fas fa-check-circle mr-1"></i> Status:</strong></span>
                                        <<span
                                            class="badge {{ $service->status === '1' ? 'badge-success' : 'badge-danger' }}">
                                            {{ $service->status === '1' ? 'Active' : 'Inactive' }}
                                            </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><strong><i class="fas fa-calendar-alt mr-1"></i> Created:</strong></span>
                                        <span>{{ $service->created_at->format('Y-m-d') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">
                                    <i class="fas fa-align-left"></i> Description
                                </h5>
                                <p class="text-muted">{!! $service->description !!}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-3">
                                    <i class="fas fa-image"></i> Service Image
                                </h5>
                                <img src="{{ asset($service->image ?? 'default/default-user.jpg') }}"
                                    class="img-fluid rounded" alt="Service Image"
                                    style="max-height: 326px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
