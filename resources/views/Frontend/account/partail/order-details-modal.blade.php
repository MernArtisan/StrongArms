<h5>Order #{{ $order->orderId }}</h5>
<p><strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->order_status) }}</p>
<p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

<hr>

<h6>Items:</h6>
<ul class="list-group">
    @foreach ($order->items as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $item->product_name }} x {{ $item->quantity }}
            <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
        </li>
    @endforeach
</ul>