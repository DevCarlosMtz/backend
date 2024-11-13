@component('mail::message')
    # Licencias de acceso

    Hola, {{ $usuario->nombre_completo }}.

    Has registrado una cuenta en {{ config('app.name') }},
    Antes de poder usar tu cuenta, debes verificar que esta es tu dirección de correo electrónico haciendo clic aquí:

    http://192.168.0.109:3000/auth/verificar/{{ $usuario->email }}

    # Las licencias de acceso son las siguientes:

    ## Correo: {{ $usuario->email }}
    ## Código de verificación: {{ $token }}


    Gracias,
    {{ config('app.name') }}
@endcomponent
