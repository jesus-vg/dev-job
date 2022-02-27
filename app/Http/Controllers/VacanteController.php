<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Experiencia;
use App\Models\Salario;
use App\Models\Ubicacion;
use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{

    public function __construct()
    {
        // indicamos que solo los usuarios autenticados y verificados pueden acceder a los metodos de este controlador
        $this->middleware( ['auth', 'verified'] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'vacantes.index', [
            // 'vacantes' => Vacante::all(),
        ] );
    }

    /**
     * Muestra el formulario para crear una nueva vacante
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagorias   = Categoria::select( 'id', 'nombre' )->get();
        $experiencias = Experiencia::select( 'id', 'nombre' )->get();
        $ubicaciones  = Ubicacion::select( 'id', 'nombre' )->get();
        $salarios     = Salario::select( 'id', 'nombre' )->get();

        return view( 'vacantes.create', [
            'categorias'   => $catagorias,
            'experiencias' => $experiencias,
            'ubicaciones'  => $ubicaciones,
            'salarios'     => $salarios,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show( Vacante $vacante )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit( Vacante $vacante )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Vacante $vacante
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy( Vacante $vacante )
    {
        //
    }

    /**
     *
     */
    public function imagenUpload( Request $request )
    {
        //
        return 'imagen upload';
    }
}
