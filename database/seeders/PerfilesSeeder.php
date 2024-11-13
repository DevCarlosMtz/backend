<?php

namespace Database\Seeders;

use App\Models\Perfiles;
use Illuminate\Database\Seeder;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfiles::truncate();

        $fechaHoraActual = now()->toDateTimeString();
        Perfiles::insert([
            [
                'id'            => 1,
                'nombre'        => 'Administrador',
                'created_at'    => $fechaHoraActual,
                'updated_at'    => $fechaHoraActual
            ],
            [
                'id'            => 2,
                'nombre'        => 'Supervisor',
                'created_at'    => $fechaHoraActual,
                'updated_at'    => $fechaHoraActual
            ],
            [
                'id'            => 3,
                'nombre'        => 'Ventas',
                'created_at'    => $fechaHoraActual,
                'updated_at'    => $fechaHoraActual
            ],
            [
                'id'            => 4,
                'nombre'        => 'Operativo',
                'created_at'    => $fechaHoraActual,
                'updated_at'    => $fechaHoraActual
            ],
        ]);
    }
}