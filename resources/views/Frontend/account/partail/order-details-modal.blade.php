<div class="card shadow-sm mb-4 border-0 rounded-4">
    <div class="card-header bg-dark text-white rounded-top-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Order #{{ $order->orderId }}</h5>
        <span class="badge bg-secondary">{{ ucfirst($order->order_status) }}</span>
    </div>

    <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Items Purchased:</h6>
        <ul class="list-group list-group-flush mb-4">
            @foreach ($order->items as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    <div>
                        <span class="fw-semibold">{{ $item->product_name }}</span>
                        <small class="text-muted d-block">Quantity: {{ $item->quantity }}</small>
                    </div>
                    <span class="fw-semibold">${{ number_format($item->price * $item->quantity, 2) }}</span>
                </li>
            @endforeach
        </ul>

        <div class="row text-sm">
            <div class="col-md-4 mb-2">
                <strong>Date:</strong><br>
                <span class="text-muted">{{ $order->created_at->format('F d, Y') }}</span>
            </div>
            <div class="col-md-4 mb-2">
                <strong>Status:</strong><br>
                <span class="text-muted">{{ ucfirst($order->order_status) }}</span>
            </div>
            <div class="col-md-4 mb-2">
                <strong>Total Amount:</strong><br>
                <span class="text-success fw-bold">${{ number_format($order->total, 2) }}</span>
            </div>
        </div>
    </div>
</div>
