<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'usuarios' => [
            'driver' => 'local',
            'root' => storage_path('app/public/usuarios'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'empresas' => [
            'driver' => 'local',
            'root' => storage_path('app/public/empresas'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'registros_unicos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/registros_unicos'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'reportes_balanceo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/reportes_balanceo'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'conexion_externa' => [
            'driver' => 'local',
            'root' => storage_path('app/public/conexion_externa'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'llegada_motor' => [
            'driver' => 'local',
            'root' => storage_path('app/public/llegada_motor'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'desensamble_electromecanico' => [
            'driver' => 'local',
            'root' => storage_path('app/public/desensamble_electromecanico'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'diagnostico_mecanico' => [
            'driver' => 'local',
            'root' => storage_path('app/public/diagnostico_mecanico'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'diagnostico_rotor_ja' => [
            'driver' => 'local',
            'root' => storage_path('app/public/diagnostico_rotor_ja'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'reporte_diagnostico' => [
            'driver' => 'local',
            'root' => storage_path('app/public/reporte_diagnostico'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'pruebas_offline' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pruebas_offline'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'juguete' => [
            'driver' => 'local',
            'root' => storage_path('app/public/juguete'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'dulce' => [
            'driver' => 'local',
            'root' => storage_path('app/public/dulce'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'deporte' => [
            'driver' => 'local',
            'root' => storage_path('app/public/deporte'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'zapato' => [
            'driver' => 'local',
            'root' => storage_path('app/public/zapato'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'pedidos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pedidos'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],
        'diagnostico_exitacion' => [
            'driver' => 'local',
            'root' => storage_path('app/public/diagnostico_exitacion'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'reporte_final' => [
            'driver' => 'local',
            'root' => storage_path('app/public/reporte_final'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'persona_desaparecida' => [
            'driver' => 'local',
            'root' => storage_path('app/public/persona_desaparecida'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
