@component('mail::message')
# Hola!

Tu petición ha sido recibida correctamente.

{{--@component('mail::button', ['url' => ''])--}}
{{--    Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
