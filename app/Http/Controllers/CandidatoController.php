<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @link https://laravel.com/docs/9.x/pagination#appending-query-string-values
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $request->validate( [
            'slugVacante' => 'required|string',
        ] );

        $vacante = Vacante::whereSlug( $request->slugVacante )->firstOrFail();

        $this->authorize( 'update', $vacante );

        $candidatos = Candidato::select( 'id', 'nombre', 'email', 'cv', 'created_at' )
            ->whereVacanteId( $vacante->id )
            ->latest()
            ->paginate( 10, ['*'], 'pagina' );

        $candidatos->appends( ['slugVacante' => $request->slugVacante] );

        return view( 'candidatos.index', compact( 'candidatos', 'vacante' ) );

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
     * @link https://laravel.com/docs/9.x/session#retrieving-data
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
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

            $vacante->reclutador->notify( new NuevoCandidato( $vacante ) );

            return back()->with( 'success', 'Gracias por postularse a la vacante, pronto nos comunicaremos con usted.' );
        }

        return back()->with( 'error', 'Ups algo no ha salido bien, intente nuevamente.' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato       $candidato
     * @return \Illuminate\Http\Response
     */
    public function show( Candidato $candidato )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato       $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit( Candidato $candidato )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Models\Candidato       $candidato
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
     * @param  \App\Models\Candidato       $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy( Candidato $candidato )
    {
        //
    }
}
