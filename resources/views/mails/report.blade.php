<x-mail::message>
Hi {{$receiver}}

{{$body}}

<x-mail::button :url="'app.systemtrustng.com'">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
