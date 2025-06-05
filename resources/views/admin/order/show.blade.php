@extends('admin.layout.layout')
@section('title', 'View Order')

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
                                <h4 class="page-title m-0">Order: #{{ $order->orderId }}</h4>
                                <a href="{{ route('orders.management') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Order Info -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-info-circle"></i> Order Details</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Order ID:</strong> <span>#{{ $order->orderId }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Status:</strong>
                                        <span id="order-status-badge"
                                            class="badge
                                                {{ $order->order_status === 'pending' ? 'badge-warning' : '' }}
                                                {{ $order->order_status === 'confirmed' ? 'badge-info' : '' }}
                                                {{ $order->order_status === 'shipped' ? 'badge-primary' : '' }}
                                                {{ $order->order_status === 'delivered' ? 'badge-success' : '' }}
                                                {{ $order->order_status === 'completed' ? 'badge-dark' : '' }}
                                            ">
                                            {{ ucfirst($order->order_status) }}
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Total:</strong> <span>${{ number_format($order->total, 2) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Payment:</strong> <span>{{ ucfirst($order->payment_method) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Placed On:</strong>
                                        <span>{{ $order->created_at->format('Y-m-d H:i') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-user"></i> Customer Info</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Name:</strong> <span>{{ $order->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Email:</strong> <span>{{ $order->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Phone:</strong> <span>{{ $order->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Address:</strong>
                                        <span>{{ $order->address }}, {{ $order->city }}, {{ $order->state }},
                                            {{ $order->zip }}, {{ $order->country }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Notes:</strong>
                                        <p class="mb-0">{{ $order->order_notes ?? 'N/A' }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Ordered Items -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="fas fa-box"></i> Ordered Items</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset($item->product_image ?? 'default/default-product.jpg') }}"
                                                            width="50" height="50" alt="Product Image">
                                                    </td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>${{ number_format($item->price, 2) }}</td>
                                                    <td>${{ number_format($item->total, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($order->items->isEmpty())
                                        <p class="text-muted">No items found in this order.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($isAdmin)
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><i class="fas fa-sync-alt"></i> Update Order Status</h5>

                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="order_status">Change Status</label>
                                            <select name="order_status" id="order_status" class="form-control">
                                                @foreach (['pending', 'confirmed', 'shipped', 'delivered', 'completed'] as $status)
                                                    <option value="{{ $status }}"
                                                        {{ $order->order_status === $status ? 'selected' : '' }}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2">
                                            <i class="fas fa-save"></i> Update
                                        </button>
                                    </form>

                                    @if (session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection
