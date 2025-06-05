<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>

<body>
    <h1>Thank you for your order!</h1>
    <p>Hi {{ $order->name }},</p>
    <p>Your order <strong>#{{ $order->orderId }}</strong> has been placed successfully.</p>
    <p>Total Amount: <strong>${{ $order->total }}</strong></p>
    <p>We will notify you once it is processed.</p>
</body>

</html>
