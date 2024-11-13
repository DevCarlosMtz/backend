<?php

namespace Database\Seeders;

use App\Models\Permisos;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permisos::truncate();

        $fechaHoraActual = now()->toDateTimeString();

        Permisos::insert([
            [
                'id'                    => 1,
                'nombre_modulo'         => 'Catalogo 1',
                'url'                   => '',
                'icono'                 => 'mdi-text-box',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 2,
                'nombre_modulo'         => 'Catalogo 2',
                'url'                   => '',
                'icono'                 => 'mdi-engine',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 3,
                'nombre_modulo'         => 'Catalogo 3',
                'url'                   => '',
                'icono'                 => '',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 4,
                'nombre_modulo'         => 'Catalogo 4',
                'url'                   => '',
                'icono'                 => 'mdi-account-multiple',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 5,
                'nombre_modulo'         => 'Catalogo 5',
                'url'                   => '',
                'icono'                 => 'mdi-engine',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 6,
                'nombre_modulo'         => 'Catalogo 6',
                'url'                   => '',
                'icono'                 => 'mdi-wrench',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 7,
                'nombre_modulo'         => 'Catalogo 7',
                'url'                   => '',
                'icono'                 => 'mdi-domain',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 8,
                'nombre_modulo'         => 'Usuarios',
                'url'                   => 'dashboard.usuarios.inicio',
                'icono'                 => 'mdi-account',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 9,
                'nombre_modulo'         => 'Catalogo 8',
                'url'                   => '',
                'icono'                 => 'mdi-credit-card',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 10,
                'nombre_modulo'         => 'Catalogo 9',
                'url'                   => '',
                'icono'                 => 'mdi-text-box-multiple-outline',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 11,
                'nombre_modulo'         => 'Catalogo 10',
                'url'                   => '',
                'icono'                 => 'mdi-folder-table-outline',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 12,
                'nombre_modulo'         => 'Catalogo 11',
                'url'                   => '',
                'icono'                 => 'mdi-folder-table-outline',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 13,
                'nombre_modulo'         => 'Catalogo 12',
                'url'                   => '',
                'icono'                 => 'mdi-toolbox',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],
            [
                'id'                    => 14,
                'nombre_modulo'         => 'Catalogo 13',
                'url'                   => '',
                'icono'                 => 'mdi-toolbox',
                'created_at'            => $fechaHoraActual,
                'updated_at'            => $fechaHoraActual
            ],

        ]);
    }
}