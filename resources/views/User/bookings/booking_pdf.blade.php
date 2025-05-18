
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Ticket</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .ticket {
            border: 1px solid #333;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
        }
        .ticket h2, .ticket h3 { margin: 10px 0; }
        .status { font-weight: bold; color: green; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Booking Ticket</h1>
        <p>Ticket Number: #{{ $booking->id }}</p>
    </div>
    <div class="ticket">
        <h2>Name: {{ $booking->user->name }}</h2>
        <h3>Table Number: {{ $booking->table->table_number }}</h3>
        <h3>Seats: {{ $booking->table->seats }}</h3>
        <h3>Status:
            @if($booking->status == 'confirmed')
                <span class="status">Confirmed</span>
            @else
                <span class="status" style="color: orange;">Pending</span>
            @endif
        </h3>
    </div>
</body>
</html>


