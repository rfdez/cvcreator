@component('mail::message')
# Introduction

Teléfono: {{ $telephone }}. <br>

{{ $details }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
