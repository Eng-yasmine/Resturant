<x-mail::message>
<h1>{{ $user['name'] }}</h1>
<hr>
<h2>Email : {{ $user['email'] }}</h2>
{{-- <h2>Phone : {{ $user['phone'] }}</h2>
<p>Message : {{ $user['message'] }}</p> --}}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
