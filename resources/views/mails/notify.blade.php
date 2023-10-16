<x-mail::message>
FSE: {{$sender}}
{{$body}}

<strong>Description:</strong><br> {{$machine}}

<strong>Site Parameters:</strong><br> {{$site}}

<strong>Diagnosis and Findings:</strong><br> {{$diagnosis}}

<strong>Recommendation:</strong><br> {{$remarks}}



Regards,<br>
{{$sender}}

{{ config('app.name') }}
</x-mail::message>
