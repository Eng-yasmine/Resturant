<x-mail::message>
    <h1>{{ $user['name'] }}</h1>
    <h2>Email : {{ $user['email'] }}</h2>
    <hr>
    <h2>Subject : {{ $user['subject'] }}</h2>
    <p>Message : {{ $user['message'] }}</p>
    <hr>
    <h2>Contact Type : {{ $Contact['contact_type'] }}</h2>
    <hr>
    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
