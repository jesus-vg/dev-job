<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos registros sobre la tabla ubicaciones
        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Remoto',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Puerto Rico',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Estados Unidos',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'México',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Canadá',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Colombia',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Perú',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'ubicaciones' )->insert( [
            'nombre'     => 'Argentina',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

    }
}
