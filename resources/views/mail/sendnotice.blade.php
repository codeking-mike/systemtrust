<x-mail::message>
Hi {{$receiver}}

    {{$body}}

<x-mail::button :url="'http://app.systemtrustng.com'">
Button Text
</x-mail::button>

Thanks,<br>
{{$sender}}
{{ config('app.name') }}
</x-mail::message>
