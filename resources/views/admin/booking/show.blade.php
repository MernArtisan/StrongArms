@extends('admin.layout.layout')
@section('title', 'View Booking')

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
                                <h4 class="page-title m-0">Booking: #{{ $booking->id }}</h4>
                                <a href="{{ route('bookings.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Booking Info -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-info-circle"></i> Booking Details</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Booking ID:</strong> <span>#{{ $booking->id }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Status:</strong>
                                        <span class="badge badge-success">{{ ucfirst($booking->status) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Booked On:</strong>
                                        <span>{{ $booking->created_at->format('Y-m-d H:i') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Date:</strong>
                                        <span>{{ $booking->date }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Time Slot:</strong>
                                        <span>{{ $booking->time_slot }}</span>
                                    </li>
                                    {{-- <li class="list-group-item">
                                        <strong>Note:</strong>
                                        <p class="mb-0">{{ $booking->note ?? 'N/A' }}</p>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Service Info -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-cogs"></i> Service Info</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Name:</strong> <span>{{ $booking->service->name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Type:</strong> <span>{{ ucfirst($booking->service->type ?? 'N/A') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Price:</strong> <span>${{ number_format($booking->service->price ?? 0, 2) }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Description:</strong>
                                        <p class="mb-0">{{ $booking->service->description ?? 'N/A' }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Provider Info -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-user"></i> Provider Info</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Name:</strong> <span>{{ $booking->provider->store_name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Email:</strong> <span>{{ $booking->provider->email ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Phone:</strong> <span>{{ $booking->provider->phone_number ?? 'N/A' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Availability Info -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-calendar-alt"></i> Availability Info</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Date:</strong> <span>{{ $booking->availability->date ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Time Slot:</strong> <span>{{ $booking->availability->time_slot ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Status:</strong>
                                        <span class="badge badge-info">{{ ucfirst($booking->availability->status ?? 'N/A') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
