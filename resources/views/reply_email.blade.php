@component('mail::message')
# Hi {{ $name }},
{{ - # {{ $senderMessage }} - }}
Receive your email. We will contact you ASAP.
@component('mail::button', ['url' => $mailData['url']])
Visit Our Website
@endcomponent
Thanks,
{{ config('app.name') }}
@endcomponent