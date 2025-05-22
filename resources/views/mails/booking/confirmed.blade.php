<x-mail::message>
    <h1> Code No : {{ $booking['id'] }}</h1>
    <h1> Dear : {{ $user['name'] }}</h1>
    <h2>Email : {{ $user['email'] }}</h2>
    <hr>

    <h3>Message : Your Ticket has been confirmed </h3>
    <h3>Booking Date : {{ $booking['booking_date'] }}</h3>
    <h3>Booking Time : {{ $booking['booking_time'] }}</h3>
    <h3>Table Number : {{ $booking['table']['table_number'] }}</h3>
    <h3>Seats : {{ $booking['table']['seats'] }}</h3>
    <h3>Status :
        {{ $booking['status'] }}
    </h3>

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
