@component('mail::message')
# Introduction

@if($communication->getTelephone() != null)
Teléfono: {{ $communication->getTelephone() }}. <br>
@endif

{{ $communication->getDetails() }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

