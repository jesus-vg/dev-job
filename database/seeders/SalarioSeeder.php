<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos salarios por rangos en USD
        DB::table( 'salarios' )->insert( [
            'nombre'     => '0 - 500 USD',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'salarios' )->insert( [
            'nombre'     => '500 - 1000 USD',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'salarios' )->insert( [
            'nombre'     => '1000 - 2000 USD',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'salarios' )->insert( [
            'nombre'     => '2000 - 3000 USD',
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        DB::table( 'salarios' )->insert( [
            'nombre'     => 'no mostrar',
            'created_at' => now(),
            'updated_at' => now(),
        ] );
    }
}
