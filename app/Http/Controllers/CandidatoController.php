<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     *
     * @link https://laravel.com/docs/9.x/session#retrieving-data
     */
    public function store( Request $request )
    {
        // dd( $request->all(), session( 'vacante_id', '0' ) );

        // verificamos que la session vacante_id exista y no sea nula
        if ( $request->session()->has( 'vacante_id' ) ) {
            $request->validate( [
                'nombre' => 'required|string|min:3|max:50',
                'email'  => 'required|email',
                'cv'     => 'required|mimes:pdf',
            ] );

            $vacante_id = session( 'vacante_id' );

            $vacante = Vacante::find( $vacante_id );

            $candidato_nuevo = $vacante->candidatos()->create( [
                'nombre' => $request->nombre,
                'email'  => $request->email,
                'cv'     => '',
            ] );

            // subimos el archivo una vez creado el candidato
            $rutaCv = $request->file( 'cv' )
                ->store( 'vacantes/' . $vacante_id . '/cv', 'public' );

            $candidato_nuevo->cv = $rutaCv;
            $candidato_nuevo->save();

            return back()->with( 'success', 'Gracias por postularse a la vacante, pronto nos comunicaremos con usted.' );
        }

        return back()->with( 'error', 'Ups algo no ha salido bien, intente nuevamente.' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show( Candidato $candidato )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit( Candidato $candidato )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Candidato $candidato
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy( Candidato $candidato )
    {
        //
    }
}
