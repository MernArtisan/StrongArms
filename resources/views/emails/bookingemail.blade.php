<h2>Hello {{ $booking->user->name ?? 'Customer' }},</h2>

<p>Thank you for your booking. Here are your booking details:</p>

<ul>
    <li><strong>Service:</strong> {{ $booking->service->name }}</li>
    <li><strong>Date:</strong> {{ $booking->date }}</li>
    <li><strong>Time Slot:</strong> {{ $booking->time_slot }}</li>
    <li><strong>Provider:</strong> {{ $booking->provider->store_name ?? 'N/A' }}</li>
    <li><strong>Amount Paid:</strong> ${{ number_format($booking->payment->amount ?? 0, 2) }}</li>
</ul>

<p>We look forward to seeing you!</p>

<p>Regards, <br> The Team</p>
