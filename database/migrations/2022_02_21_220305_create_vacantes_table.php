<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creamos dos migraciones en un mismo archivo porque estan relacionadas

        Schema::create( 'categorias', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'nombre' );
            $table->timestamps();
        } );

        Schema::create( 'vacantes', function ( Blueprint $table ) {
            $table->id();
            // relacionamos con la tabla categoria
            $table->foreignId( 'categoria_id' )->constrained()->onDelete( 'cascade' ); // eliminamos la categoria si se elimina la vacante con el metodo cascade
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'vacantes' );
        Schema::dropIfExists( 'categorias' );

    }
};
