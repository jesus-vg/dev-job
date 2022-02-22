<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $FECHA_CREACION = Carbon::now();
        DB::table( 'experiencias' )->insert( [
            'nombre'     => '0 - 6 meses',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '6 meses - 1 año',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '1 año - 3 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '3 años - 5 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '5 años - 7 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '7 años - 10 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '10 años - 15 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => '15 años - 20 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );

        DB::table( 'experiencias' )->insert( [
            'nombre'     => 'mas de 20 años',
            'created_at' => $FECHA_CREACION,
            'updated_at' => $FECHA_CREACION,
        ] );
    }
}
