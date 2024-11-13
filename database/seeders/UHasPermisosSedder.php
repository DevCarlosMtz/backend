<?php

namespace Database\Seeders;

use App\Models\UsuarioHasPermisos;
use Illuminate\Database\Seeder;

class UHasPermisosSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsuarioHasPermisos::truncate();

        UsuarioHasPermisos::insert([
            [
                'id_usuarios' => 1,
                'id_permisos' => 1
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 2
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 3
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 4
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 5
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 6
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 7
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 8
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 9
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 10
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 11
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 12
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 13
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 14
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 15
            ],
            [
                'id_usuarios' => 1,
                'id_permisos' => 16
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 17
            ],

        ]);
        UsuarioHasPermisos::insert([
            [
                'id_usuarios' => 2,
                'id_permisos' => 1
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 2
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 3
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 4
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 5
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 6
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 7
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 8
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 9
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 10
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 11
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 12
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 13
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 14
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 15
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 16
            ],
            [
                'id_usuarios' => 2,
                'id_permisos' => 17
            ],
        ]);

        // UsuarioHasPermisos::insert([
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 1
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 2
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 3
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 4
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 5
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 6
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 7
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 8
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 9
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 10
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 11
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 12
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 13
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 14
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 15
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 16
        //     ],
        //     [
        //         'id_usuarios' => 3,
        //         'id_permisos' => 17
        //     ],
        // ]);

        // UsuarioHasPermisos::insert([
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 1
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 2
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 3
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 4
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 5
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 6
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 7
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 8
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 9
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 10
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 11
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 12
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 13
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 14
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 15
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 16
        //     ],
        //     [
        //         'id_usuarios' => 4,
        //         'id_permisos' => 17
        //     ],
        // ]);

        // UsuarioHasPermisos::insert([
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 1
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 2
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 3
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 4
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 5
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 6
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 7
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 8
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 9
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 10
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 11
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 12
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 13
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 14
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 15
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 16
        //     ],
        //     [
        //         'id_usuarios' => 6,
        //         'id_permisos' => 17
        //     ],
        // ]);

        // UsuarioHasPermisos::insert([
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 1
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 2
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 3
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 4
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 5
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 6
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 7
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 8
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 9
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 10
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 11
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 12
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 13
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 14
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 15
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 16
        //     ],
        //     [
        //         'id_usuarios' => 7,
        //         'id_permisos' => 17
        //     ],
        // ]);

        // UsuarioHasPermisos::insert([
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 1
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 2
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 3
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 4
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 5
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 6
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 7
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 8
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 9
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 10
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 11
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 12
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 13
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 14
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 15
        //     ],
        //     [
        //         'id_usuarios' => 8,
        //         'id_permisos' => 16
        //     ],
        //]);
    }
}