<?php

namespace Database\Seeders;

use App\Models\Puestos;
use Illuminate\Database\Seeder;

class PuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puestos::truncate();

        $fechaHoraActual = now()->toDateTimeString();

        Puestos::insert([
            [
                'id'                        => '1',
                'puesto'                    => 'Coordinador de Capacitación',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '2',
                'puesto'                    => 'Operador Electrónico',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '3',
                'puesto'                    => 'Operador Eléctrico',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '4',
                'puesto'                    => 'Administrador de Contabilidad',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '5',
                'puesto'                    => 'Chofer',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '6',
                'puesto'                    => 'Ingeniería de Proceso',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '7',
                'puesto'                    => 'Coordinador de Soporte Electrónico',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '8',
                'puesto'                    => 'Coordinador de Soporte Eléctrico',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '9',
                'puesto'                    => 'Operador de Producción de Bobinas de Baja Tensión',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '10',
                'puesto'                    => 'Coordinador de Mejora Continua',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '11',
                'puesto'                    => 'Coordinador de Soporte Mecánico',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '12',
                'puesto'                    => 'Encargado de Almacén',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '13',
                'puesto'                    => 'Coordinador de Ventas',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '14',
                'puesto'                    => 'Subdirector General',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '15',
                'puesto'                    => 'Director General',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '16',
                'puesto'                    => 'Soldador',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '17',
                'puesto'                    => 'Operador Mecánico',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
            [
                'id'                        => '18',
                'puesto'                    => 'Administrador de Tecnologías de la Información',
                'created_at'                => $fechaHoraActual,
                'updated_at'                => $fechaHoraActual,
            ],
        ]);
    }
}
