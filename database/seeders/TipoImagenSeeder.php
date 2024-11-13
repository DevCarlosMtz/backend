<?php

namespace Database\Seeders;

use App\Models\TipoImagen;
use Illuminate\Database\Seeder;

class TipoImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoImagen::insert([
            [
                'id'                 => 1,
                'nombre'             => 'Evidencia',
            ],
            [
                'id'                 => 2,
                'nombre'             => 'REGISTRO UNICO',
            ],
            [
                'id'                 => 3,
                'nombre'             => 'CONEXION EXTERNA',
            ],
            [
                'id'                 => 4,
                'nombre'             => 'LUBRICACION RODAMIENTOS LC Y LCC',
            ],
            [
                'id'                 => 5,
                'nombre'             => 'CAJAS DE ALOJAMIENTO Y MUÑONES DE EJE LC Y LCC',
            ],
            [
                'id'                 => 6,
                'nombre'             => 'LIMPIEZA Y DESHIDRATADO DE ROTORES DEVANADOS',
            ],
            [
                'id'                 => 7,
                'nombre'             => 'DIAGNOSTICO ROTOR JA 0°',
            ],
            [
                'id'                 => 8,
                'nombre'             => 'DIAGNOSTICO ROTOR JA 90°',
            ],
            [
                'id'                 => 9,
                'nombre'             => 'DIAGNOSTICO ROTOR JA 180°',
            ],
            [
                'id'                 => 10,
                'nombre'             => 'DIAGNOSTICO ROTOR JA 270°',
            ],
            [
                'id'                 => 11,
                'nombre'             => 'DIAGNOSTICO ROTOR JA 360°',
            ],
            [
                'id'                 => 12,
                'nombre'             => 'REPORTE DIAGNOSTICO LLEGADA DE TRANSPORTE A INSTALACIONES',
            ],
            [
                'id'                 => 13,
                'nombre'             => 'REPORTE DIAGNOSTICO PRUEBAS ESTATICAS',
            ],
            [
                'id'                 => 14,
                'nombre'             => 'REPORTE DIAGNOSTICO PORTAPAWER',
            ],
            [
                'id'                 => 15,
                'nombre'             => 'REPORTE DIAGNOSTICO DESENSAMBLE',
            ],
            [
                'id'                 => 16,
                'nombre'             => 'REPORTE DIAGNOSTICO INSPECCION VISUAL',
            ],
            [
                'id'                 => 17,
                'nombre'             => 'REPORTE DIAGNOSTICO TIPO FALLA',
            ],
            [
                'id'                 => 18,
                'nombre'             => 'REPORTE DIAGNOSTICO LUBRICACION',
            ],
            [
                'id'                 => 19,
                'nombre'             => 'REPORTE DIAGNOSTICO MUNON EJE LC',
            ],
            [
                'id'                 => 20,
                'nombre'             => 'REPORTE DIAGNOSTICO MUNON EJE LCC',
            ],
            [
                'id'                 => 21,
                'nombre'             => 'REPORTE DIAGNOSTICO CAJA ALOJAMIENTO LC',
            ],
            [
                'id'                 => 22,
                'nombre'             => 'REPORTE DIAGNOSTICO CAJA ALOJAMIENTO LCC',
            ],
            [
                'id'                 => 23,
                'nombre'             => 'PRUEBAS OFFLINE CONEXION FISICA',
            ],
            [
                'id'                 => 24,
                'nombre'             => 'PRUEBAS OFFLINE CONEXION DIAGRAMA',
            ],
            [
                'id'                 => 25,
                'nombre'             => 'PRUEBAS OFFLINE HORNO PIROLITICO',
            ],
            [
                'id'                 => 26,
                'nombre'             => 'PRUEBAS OFFLINE PRUEBA TOROIDE',
            ],
            [
                'id'                 => 27,
                'nombre'             => 'PRUEBAS OFFLINE SAMATIC',
            ],
            [
                'id'                 => 28,
                'nombre'             => 'PRUEBAS OFFLINE IMPREGNACION HORNEADO',
            ],
            [
                'id'                 => 29,
                'nombre'             => 'PRUEBAS OFFLINE DOBLE PUENTE KELVIN',
            ],
            [
                'id'                 => 30,
                'nombre'             => 'PEDIDOS',
            ],
            [
                'id'                 => 31,
                'nombre'             => 'PLACA DE DATOS',
            ],
            [
                'id'                 => 32,
                'nombre'             => 'PRUEBA TOROIDE',
            ],
            [
                'id'                 => 33,
                'nombre'             => 'SAMATIC( FABRICACION DE BOBINAS ) // BOBINAD DENTRO DEL ESTATOR',
            ],
            [
                'id'                 => 34,
                'nombre'             => 'FOTO HORNO',
            ],
            [
                'id'                 => 35,
                'nombre'             => 'FOTOS PRUEBA BAKER',
            ],
            [
                'id'                 => 36,
                'nombre'             => 'INDUCCION DE RODAMIENTOS',
            ],
            [
                'id'                 => 37,
                'nombre'             => 'COLOCACION DE RODAMIENTOS',
            ],
            [
                'id'                 => 38,
                'nombre'             => 'LUBRICACION DE RODAMIENTOS',
            ],
            [
                'id'                 => 39,
                'nombre'             => 'PRUEBA DINAMICA EN VACIO (PUEDE SER CON EL EXPLORER O CAMARA TERMOGRAFICA)',
            ],
            [
                'id'                 => 40,
                'nombre'             => 'FOTO DEL TRANSPORTE // FOTO YA PINTADO Y LISTO',
            ],
            [
                'id'                 => 41,
                'nombre'             => 'LAVADO CON CARCHER',
            ],
            [
                'id'                 => 42,
                'nombre'             => 'HORNEADO',
            ],
            [
                'id'                 => 43,
                'nombre'             => 'FOTOS PRUEBAS CON BAKER REPORTE FINAL',
            ],
            [
                'id'                 => 44,
                'nombre'             => 'RODAMIENTOS EN EL INDUCTOR',
            ],
            [
                'id'                 => 45,
                'nombre'             => 'ENGRASADO DE RODAMIENTOS',
            ],
            [
                'id'                 => 46,
                'nombre'             => 'ENSAMBLE FRONTAL',
            ],
            [
                'id'                 => 47,
                'nombre'             => 'ENSAMBLE LATERAL',
            ],
                [
                    'id'                 => 48,
                    'nombre'             => 'ESCOBILLAS ENUMERADAS',
            ],
            [
                'id'                 => 49,
                'nombre'             => 'T',
            ],
            [
                'id'                 => 50,
                'nombre'             => 'REPORTE DE PRESION',
            ],
            [
                'id'                 => 51,
                'nombre'             => 'PORTA ESCOBILLAS VS CONMUTADOR',
        ]]);
    }
}
