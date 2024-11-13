<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::truncate();

        $fechaHoraActual = now()->toDateTimeString();
        Empresa::insert([
            [
                'foto'               => 'nullable',
                'id'                 => 1,
                'nombre'             => 'RALOY LUBRICANTES SA DE CV',
                'rfc'                => 'U840130J27',
                'responsable'        => 'EJEMPLO',
                'domicilio_fiscal'   => 'EJEMPLO',
                'dominio'            => 'www.ejemplo.mx',
                'aviso_privacidad'   => 'Aviso de privacidad',
                'telefono'           => '1234567890',
                'created_at'         => $fechaHoraActual,
                'updated_at'         => $fechaHoraActual
            ],
            [
                'foto'               => 'nullable',
                'id'                 => 2,
                'nombre'             => 'ZAR/KRUSE, S.A. DE C.V',
                'rfc'                => 'R110720UY5',
                'responsable'        => 'Ejemplo',
                'domicilio_fiscal'   => 'Ejemplo',
                'dominio'            => 'www.ejemplo.com',
                'aviso_privacidad'   => 'Aviso de privacidad',
                'telefono'           => '1234567890',
                'created_at'         => $fechaHoraActual,
                'updated_at'         => $fechaHoraActual
            ],

        ]);
    }
}
