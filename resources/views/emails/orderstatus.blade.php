<!DOCTYPE html>
<html>

<head>
    <title>Order Status Updated</title>
</head>

<body>
    <p>Dear {{ $order->customer_name }},</p>

    <p>Your order (Order ID: {{ $order->orderId }}) status has been updated.</p>

    <p>New Status: <strong>{{ $order->order_status }}</strong></p>

    <p>Thank you for shopping with us!</p>
</body>

</html>
