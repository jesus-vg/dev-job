<?php

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

// Ruta de vacantes
Route::get( '/vacantes', [VacanteController::class, 'index'] )->name( 'vacantes.index' );
