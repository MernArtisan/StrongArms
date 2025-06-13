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

        /* Small badge button look */
        .booking-status-badge {
            cursor: pointer;
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 12px;
        }

        .booking-status-select {
            width: 140px;
            margin-top: 6px;
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
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Status:</strong>
                                        @if ($isProvider)
                                            <div style="min-width: 160px; text-align: right;">
                                                <!-- Badge -->
                                                <span
                                                    class="badge booking-status-badge badge-{{ $booking->status == 'confirmed' ? 'success' : 'primary' }}"
                                                    data-booking-id="{{ $booking->id }}">
                                                    {{ ucfirst($booking->status) }} <i class="fas fa-chevron-down ms-1"></i>
                                                </span>

                                                <!-- Hidden select -->
                                                <select class="form-select form-select-sm booking-status-select d-none"
                                                    data-booking-id="{{ $booking->id }}">
                                                    <option value="confirmed"
                                                        {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed
                                                    </option>
                                                    <option value="completed"
                                                        {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed
                                                    </option>
                                                </select>
                                            </div>
                                        @else
                                            <span
                                                class="badge booking-status-badge badge-{{ $booking->status == 'confirmed' ? 'success' : 'primary' }}"
                                                data-booking-id="{{ $booking->id }}">
                                                {{ ucfirst($booking->status) }} <i class="fas fa-chevron-down ms-1"></i>
                                            </span>
                                        @endif
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
                                        <strong>Price:</strong>
                                        <span>${{ number_format($booking->service->price ?? 0, 2) }}</span>
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
                                        <strong>Phone:</strong>
                                        <span>{{ $booking->provider->phone_number ?? 'N/A' }}</span>
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
                                        <strong>Time Slot:</strong>
                                        <span>{{ $booking->availability->time_slot ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Status:</strong>
                                        <span
                                            class="badge badge-info">{{ ucfirst($booking->availability->status ?? 'N/A') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Click badge → show select
            document.querySelectorAll('.booking-status-badge').forEach(function(badge) {
                badge.addEventListener('click', function() {
                    const bookingId = this.getAttribute('data-booking-id');
                    const select = document.querySelector(
                        `.booking-status-select[data-booking-id="${bookingId}"]`);
                    select.classList.toggle('d-none');
                });
            });

            // On select change → AJAX
            document.querySelectorAll('.booking-status-select').forEach(function(select) {
                select.addEventListener('change', function() {
                    const bookingId = this.getAttribute('data-booking-id');
                    const newStatus = this.value;

                    fetch(`/bookings/${bookingId}/ajax-update-status`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: newStatus
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update badge text and color
                                const badge = document.querySelector(
                                    `.booking-status-badge[data-booking-id="${bookingId}"]`);
                                badge.textContent = newStatus.charAt(0).toUpperCase() +
                                    newStatus.slice(1);
                                badge.classList.remove('badge-success', 'badge-primary');

                                if (newStatus === 'confirmed') {
                                    badge.classList.add('badge-success');
                                } else {
                                    badge.classList.add('badge-primary');
                                }

                                // Hide select
                                this.classList.add('d-none');
                            } else {
                                alert('Failed to update status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error updating status.');
                        });
                });
            });
        });
    </script>

@endsection
