<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('rol')->default('empleado'); // admin, jefe, empleado
        $table->integer('id_empleado')->nullable();

        // Relación con empleados
        $table->foreign('id_empleado')
              ->references('id_empleado')->on('empleados')
              ->onDelete('set null');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['id_empleado']);
        $table->dropColumn(['rol', 'id_empleado']);
    });
}

};