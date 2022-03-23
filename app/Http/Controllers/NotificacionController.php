<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke( Request $request )
    {
        $notificaciones_sin_leer = auth()->user()->unreadNotifications;
        $notificaciones_leidas   = auth()->user()->readNotifications;

        auth()->user()->unreadNotifications->markAsRead();

        return view( 'notificaciones.index', [
            'notificaciones_sin_leer' => $notificaciones_sin_leer,
            'notificaciones_leidas'   => $notificaciones_leidas,
        ] );
    }
}
