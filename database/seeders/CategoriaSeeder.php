<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // agregamos 10 categorias relacionadas a las vacantes con perfiles de trabajo en Tecnologia y desarrollo de software
        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Frontend',
            'created_at' => now(),
            'updated_at' => now(),
        ] );
        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Backend',
            'created_at' => now(),
            'updated_at' => now(),
        ] );
        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Fullstack',
            'created_at' => now(),
            'updated_at' => now(),
        ] );
        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Mobile',
            'created_at' => now(),
            'updated_at' => now(),
        ] );
        DB::table( 'categorias' )->insert( [
            'nombre'     => 'DevOps',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Diseño',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Marketing Digital',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'categorias' )->insert( [
            'nombre'     => 'DBA',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'categorias' )->insert( [
            'nombre'     => 'Soporte',
            'created_at' => now(),
            'updated_at' => now(),
        ] );
    }
}
