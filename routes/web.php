<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// incluimos las rutas de larabel brezze las cuales contienen las rutas de autenticacion y registro
require __DIR__ . '/auth.php';

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/dashboard', function () {
    return view( 'dashboard' );
} )->middleware( ['auth', 'verified'] )->name( 'dashboard' );

// doc para rutas tipo resource controller
// https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
// doc https://aprendible.com/series/laravel-desde-cero/lecciones/route-resource
// Ruta de vacantes

// Route::resource( 'vacantes', VacanteController::class )
//     ->names( 'vacantes' ) // nombre de las rutas ej. vacantes.index, vacantes.create, vacantes.store, etc
//     ->parameters( [
//         'vacantes' => 'vacante', // nombre del parametro que se usa en las rutas ej. /vacantes/{vacante} (vacante es el parametro)
//     ] );

Route::middleware( ['auth', 'verified'] )->group( function () {
    Route::get( '/notificaciones', NotificacionController::class )->name( 'notificaciones.index' );

    Route::resource( 'candidatos', CandidatoController::class )->only( [
        'index', 'store',
    ] );

    Route::resource( 'vacantes', VacanteController::class );

    Route::controller( VacanteController::class )
        ->prefix( 'vacantes' )
        ->group( function () {
            // subida de imagenes
            Route::post( '/imagen-upload', 'imagenUpload' )->name( 'vacantes.imagen-upload' );
            Route::post( '/imagen-delete', 'imagenDelete' )->name( 'vacantes.imagen-delete' );
            // Cambio de estado de la vacante
            Route::post( '/cambiar-estado/{vacante}', 'updateEstado' )->name( 'vacantes.update-estado' );
        } );

} );
