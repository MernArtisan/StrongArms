@extends('frontend.account.myprofile')

@section('profile-content')
    <style>
        :root {
            --account-order-red: #d32f2f;
            --account-order-dark: #1a1a1a;
            --account-order-gray: #2d2d2d;
            --account-order-light: #f5f5f5;
        }

        .my-main-cont {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .account-order-profile-header {
            background: linear-gradient(135deg, var(--account-order-dark), var(--account-order-gray));
            color: white;
            padding: 30px;
            border-radius: 8px 8px 0 0;
        }

        .account-order-profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid var(--account-order-red);
            object-fit: cover;
        }

        .account-order-sidebar {
            background-color: white;
            border-radius: 8px;
            padding: 0;
            height: auto;
            overflow: hidden;
        }

        .account-order-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .account-order-sidebar-menu li {
            border-bottom: 1px solid #eee;
        }

        .account-order-sidebar-menu li:last-child {
            border-bottom: none;
        }

        .account-order-sidebar-menu a {
            display: block;
            padding: 15px 20px;
            color: var(--account-order-dark);
            text-decoration: none;
            transition: all 0.3s;
        }

        .account-order-sidebar-menu a:hover,
        .account-order-sidebar-menu a.account-order-active {
            background-color: #f8f9fa;
            color: var(--account-order-red);
            border-left: 4px solid var(--account-order-red);
        }

        .account-order-sidebar-menu i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }

        /*****account-booking-css*****/
        :root {
            --account-booking-red: #d32f2f;
            --account-booking-dark: #1a1a1a;
            --account-booking-gray: #2d2d2d;
        }

        .account-booking-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            color: #878244;
        }

        .account-booking-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .account-booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .account-booking-header {
            background: linear-gradient(135deg, var(--account-booking-dark), var(--account-booking-gray));
            color: white;
            padding: 15px 20px;
        }

        .account-booking-id {
            font-weight: 700;
            color: var(--account-booking-red);
        }

        .account-booking-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .account-booking-status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .account-booking-status-confirmed {
            background-color: #d4edda;
            color: #155724;
        }

        .account-booking-status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .account-booking-details-btn {
            background-color: var(--account-booking-dark);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .account-booking-details-btn:hover {
            background-color: #878244;
        }

        /* Popup Modal Styles */
        .account-booking-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: fixed;
            overflow-y: auto;
            /* Enable scrolling inside modal */
            overscroll-behavior: contain;
            /* Prevent scroll chaining */
        }

        .account-booking-modal-content {
            background-color: #060606;
            margin: 5% auto;
            padding: 25px;
            border-radius: 8px;
            width: 80%;
            max-width: 700px;
            position: relative;
            animation: account-booking-modalopen 0.4s;
        }

        @keyframes account-booking-modalopen {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .account-booking-close {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #878244;
        }

        .account-booking-close:hover {
            color: var(--account-booking-red);
        }

        .account-booking-modal-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .account-booking-modal-title {
            color: #878244;
        }

        .account-booking-modal-body {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .account-booking-modal-group {
            flex: 1;
            min-width: 200px;
        }

        .account-booking-modal-label {
            font-weight: 600;
            color: #878244;
            margin-bottom: 5px;
        }

        .account-booking-modal-value {
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }

        .account-booking-weapon-img {
            width: 80px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            .account-booking-modal-content {
                width: 95%;
                margin: 10% auto;
            }
        }

        .account-booking-scroll {
            max-height: 600px;
            /* you can adjust this height */
            overflow-y: auto;
            padding-right: 10px;
            /* some space for scrollbar */
        }
    </style>

    <div class="account-booking-container col-lg-8">
        <h2 class="mb-4"><i class="fas fa-calendar-check me-2"></i> My Weapon Bookings</h2>
        <div class="account-booking-scroll">
            @forelse ($bookings as $index => $booking)
                @php
                    // generate unique modal id per booking
                    $modalId = 'bookingModal' . $booking->id;
                    $statusClass = match ($booking->status) {
                        'confirmed' => 'account-booking-status-confirmed',
                        'completed' => 'account-booking-status-completed',
                        default => '',
                    };
                @endphp

                <div class="account-booking-card">
                    <div class="account-booking-header d-flex justify-content-between align-items-center">
                        <div>
                            <span class="account-booking-id">#BOOKING-{{ $index + 1 }}</span>
                            <span
                                class="account-booking-status {{ $statusClass }} ms-3">{{ ucfirst($booking->status) }}</span>
                        </div>
                        <div class="text-white">
                            <i class="fas fa-calendar-day me-1"></i>
                            {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h5 class="mb-1">{{ $booking->service->name }}</h5>
                                <p class="mb-0 text-muted">Provider: {{ $booking->availability->service->type ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="mb-1"><i class="fas fa-user-tie me-2"></i> Vendor:
                                    {{ $booking->service->provider->store_name ?? 'N/A' }}</p>
                                <p class="mb-0"><i class="fas fa-clock me-2"></i> {{ $booking->time_slot }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="mb-0">${{ number_format($booking->service->price, 2) }}</h5>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="account-booking-details-btn"
                                    onclick="accountBookingOpenModal('{{ $modalId }}')">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Details Modal -->
                <div id="{{ $modalId }}" class="account-booking-modal">
                    <div class="account-booking-modal-content">
                        <span class="account-booking-close"
                            onclick="accountBookingCloseModal('{{ $modalId }}')">&times;</span>
                        <div class="account-booking-modal-header">
                            <h3 class="account-booking-modal-title"><i class="fas fa-calendar-check me-2"></i> Booking
                                Details
                            </h3>
                            <div class="d-flex align-items-center mt-2">
                                <span class="account-booking-id me-3">#BOOK-{{ $booking->id }}</span>
                                <span
                                    class="account-booking-status {{ $statusClass }}">{{ ucfirst($booking->status) }}</span>
                            </div>
                        </div>
                        <div class="account-booking-modal-body">
                            <div class="account-booking-modal-group">
                                <p class="account-booking-modal-label">Service Name:</p>
                                <p class="account-booking-modal-value">{{ $booking->service->name }}</p>

                                <p class="account-booking-modal-label">Booking Date:</p>
                                <p class="account-booking-modal-value">
                                    {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>

                                <p class="account-booking-modal-label">Time Slot:</p>
                                <p class="account-booking-modal-value">{{ $booking->time_slot }}</p>
                            </div>
                            <div class="account-booking-modal-group">
                                <p class="account-booking-modal-label">Vendor:</p>
                                <p class="account-booking-modal-value">
                                    {{ $booking->service->provider->store_name ?? 'N/A' }}
                                </p>

                                <p class="account-booking-modal-label">Location:</p>
                                <p class="account-booking-modal-value">{{ $booking->availability->location ?? 'N/A' }}</p>

                                <p class="account-booking-modal-label">Total Amount:</p>
                                <p class="account-booking-modal-value">${{ number_format($booking->service->price, 2) }}
                                </p>
                            </div>
                            <div class="account-booking-modal-group">
                                <p class="account-booking-modal-label">Special Instructions:</p>
                                <p class="account-booking-modal-value">{{ $booking->note ?? 'N/A' }}</p>

                                <p class="account-booking-modal-label">Booking Created:</p>
                                <p class="account-booking-modal-value">{{ $booking->created_at->format('d M Y h:i A') }}
                                </p>
                            </div>
                        </div>
                        <button class="account-booking btn1" onclick="accountBookingCloseModal('{{ $modalId }}')">
                            <i class="fas fa-times"></i> Close
                        </button>
                    </div>
                </div>

            @empty
                <p>No bookings found.</p>
            @endforelse
        </div>

    </div>

    <script>
        function accountBookingOpenModal(modalId) {
            document.getElementById(modalId).style.display = "block";
            document.body.style.overflow = "hidden";
        }

        function accountBookingCloseModal(modalId) {
            document.getElementById(modalId).style.display = "none";
            document.body.style.overflow = "auto";
        }

        window.onclick = function(event) {
            if (event.target.classList.contains("account-booking-modal")) {
                event.target.style.display = "none";
                document.body.style.overflow = "auto";
            }
        }
    </script>
@endsection
