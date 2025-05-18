<x-mail::message>
    <h1> Code No : {{ $booking['id'] }}</h1>
    <h1> Dear : {{ $user['name'] }}</h1>
    <h2>Email : {{ $user['email'] }}</h2>
    <hr>

    <p>Message : Your Ticket has been confirmed </p>
    <p>Booking Date : {{ $booking['booking_date'] }}</p>
    <p>Booking Time : {{ $booking['booking_time'] }}</p>
    <p>Table Number : {{ $booking['table']['table_number'] }}</p>
    <p>Seats : {{ $booking['table']['seats'] }}</p>
    <p>Status :
        @if ($booking['status'] == 'confirmed')
            <span class="status">Confirmed</span>
        @else
            <span class="status" style="color: orange;">Pending</span>
        @endif

        <x-mail::button :url="''">
            Button Text
        </x-mail::button>

        Thanks,<br>
        {{ config('app.name') }}
</x-mail::message>
