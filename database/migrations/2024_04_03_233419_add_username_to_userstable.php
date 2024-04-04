<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creamos una migración con `php artisan make:migration <nombre>`.
 *
 * El método `up` es el que se ejecuta cuando hacemos la migración, mientras que el
 * método `down` es el que se ejecuta cuando hacemos un `rollback`.
 *
 * Para este caso, añadimos la columna `username` a la tabla `users`. Para ejecutar la migración,
 * en la consola ejecutamos `php artisan migrate`.
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
