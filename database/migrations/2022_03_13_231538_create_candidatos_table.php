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
        Schema::create( 'candidatos', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'nombre' );
            $table->string( 'email' );
            $table->string( 'cv' );
            // relacion con la tabla vacante
            $table->foreignId( 'vacante_id' )->constrained()->references( 'id' )->on( 'vacantes' );
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
        Schema::dropIfExists( 'candidatos' );
    }
};
