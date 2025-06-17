@extends('Frontend.account.myprofile')

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

        .account-order-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgb(141 137 137 / 28%);
            overflow: hidden;
            transition: transform 0.3s;
            color: #878244;
        }

        .account-order-card:hover {
            transform: translateY(-5px);
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

        .account-order-stats-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            height: 100%;
        }

        .account-order-stats-box h3 {
            color: var(--account-order-red);
            font-weight: 700;
        }

        .account-order-stats-box p {
            color: var(--account-order-gray);
            font-size: 0.9rem;
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

        .account-order-order-card {
            border-left: 4px solid var(--account-order-red);
            margin-bottom: 20px;
        }

        .account-order-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .account-order-status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .account-order-status-processing {
            background-color: #cce5ff;
            color: #004085;
        }

        .account-order-status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .account-order-status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .account-order-weapon-thumbnail {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .account-order-badge-caliber {
            background-color: var(--account-order-dark);
            color: white;
        }
    </style>

    <div class="col-lg-8">
        <div class="account-order-card p-4 mb-4">
            <h4 class="mb-4"><i class="fas fa-clipboard-list me-2"></i>Orders</h4>

            {{-- Scrollable container --}}
            <div style="max-height: 300px; overflow-y: auto;">
                @foreach ($order as $o)
                    <div class="account-order-order-card account-order-card p-3">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-8">
                                <h6 class="mb-1">Order #{{ $o->orderId }}</h6>
                            </div>
                            <div class="col-md-3 col-6 mt-2 mt-md-0">
                                <p class="mb-1 small">{{ \Carbon\Carbon::parse($o->created_at)->format('F d, Y') }}</p>

                                @php
                                    $statusClass = match ($o->order_status) {
                                        'pending' => 'account-order-status-pending',
                                        'confirmed', 'shipped' => 'account-order-status-processing',
                                        'delivered', 'completed' => 'account-order-status-completed',
                                        default => 'bg-secondary text-white',
                                    };
                                @endphp
                                <span class="account-order-status {{ $statusClass }}">
                                    {{ ucfirst($o->order_status) }}
                                </span>
                            </div>
                            <div class="col-md-3 col-6 text-md-end mt-2 mt-md-0">
                                <h6 class="mb-1">${{ number_format($o->total, 2) }}</h6>
                                <a href="#" class="btn btn-sm btn-outline-light view-order-details"
                                    data-order-id="{{ $o->orderId }}" data-bs-toggle="modal"
                                    data-bs-target="#orderDetailModal">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="orderDetailModalLabel">Order Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalContent">
                        <p>Loading...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('orderDetailModal');
            const modalContent = document.getElementById('modalContent');

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const orderId = button.getAttribute('data-order-id');

                modalContent.innerHTML = '<p>Loading...</p>';

                fetch(`/account/orders/${orderId}`)

                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.text();
                    })
                    .then(html => {
                        modalContent.innerHTML = html;
                    })
                    .catch(error => {
                        modalContent.innerHTML =
                            `<p class="text-danger">Failed to load order details.</p>`;
                        console.error('Fetch error:', error);
                    });
            });
        });
    </script>
@endsection
