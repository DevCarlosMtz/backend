<?php

namespace Database\Seeders;

use App\Models\UsuarioHasPermisos;
use App\Models\Usuarios;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Usuarios::truncate();

        $fechaHoraActual = now()->toDateTimeString();
        Usuarios::insert([

            [
                'id'                        => 1,
                'nombre'                    => 'Alejandro',
                'ap_pat'                    => 'López',
                'ap_mat'                    => 'Huerta',
                'email'                     => 'alejandro@gmail.com',
                'password'                  => bcrypt('Alejandro**2024'),
                'sueldo'                    => '1000.00',
                'email_verified_at'         => $fechaHoraActual,
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
                'id_perfiles'               => 1, // Administrador
                'id_empresas'               => 1, // Empresa
                'id_puestos'                => 15 // Director General
            ],
            [
                'id'                        => 2,
                'nombre'                    => 'Carlos',
                'ap_pat'                    => 'Martínez',
                'ap_mat'                    => 'Beltrán',
                'email'                     => 'carlos_mtz_bln@hotmail.com',
                'password'                  => bcrypt('123'),
                'sueldo'                    => '1000.00',
                'email_verified_at'         => $fechaHoraActual,
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
                'id_perfiles'               => 4, // Operativo
                'id_empresas'               => 1, // Empresa
                'id_puestos'                => 18 // Administrador TIC
            ]
        ]);
    }
}
