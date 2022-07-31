@component('mail::message')
# Greetings

You have a new email/message from {{ $data->name }}.

Subject: {{ $data->subject }}

{{ $data->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
