<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            UsuariosSeeder::class,
            PerfilesSeeder::class,
            EmpresasSeeder::class,
            TipoImagenSeeder::class,
            PuestosSeeder::class,
            PermisosSeeder::class,
            UHasPermisosSedder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
