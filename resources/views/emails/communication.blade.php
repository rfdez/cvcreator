@component('mail::message')
# Otro cliente :)

Nombre: {{ $communication->getName() }}

@if($communication->getTelephone() != null)
Teléfono: {{ $communication->getTelephone() }}.
@endif

Contacto: {{ $communication->getEmail() }}

Quiere: {{ $communication->getSubject() }}

{{ $communication->getDetails() }}

{{--@component('mail::button', ['url' => ''])--}}
{{--    Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
