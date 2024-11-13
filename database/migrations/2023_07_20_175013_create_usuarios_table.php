<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->longText('foto')->nullable();
            $table->string('nombre', 255);
            $table->string('ap_pat', 255);
            $table->string('ap_mat', 255);
            $table->string('email')->unique();
            $table->longText('password')->nullable();
            $table->decimal('sueldo', $precision = 12, $scale = 2)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreignId('id_perfiles')->constrained('perfiles', 'id');
            $table->foreignId('id_empresas')->constrained('empresas', 'id');
            $table->foreignId('id_puestos')->constrained('puestos', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
