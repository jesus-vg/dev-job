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
        // Validamos los datos del formulario
        $request->validate( [
            'titulo'      => 'required|string|min:10|max:255',
            'descripcion' => 'required|string|min:50',
            'categoria'   => 'required|integer',
            'experiencia' => 'required|integer',
            'ubicacion'   => 'required|integer',
            'salario'     => 'required|integer',
            'imagen'      => 'required',
            'skills'      => 'required|string|min:10|max:255',

        ] );

        return 'vacante creada';
        // Creamos una nueva vacante
        $vacante                 = new Vacante();
        $vacante->titulo         = $request->titulo;
        $vacante->descripcion    = $request->descripcion;
        $vacante->categoria_id   = $request->categoria_id;
        $vacante->experiencia_id = $request->experiencia_id;
        $vacante->ubicacion_id   = $request->ubicacion_id;
        $vacante->salario_id     = $request->salario_id;
        $vacante->save();

        // Redireccionamos al dashboard

        return redirect()->route( 'dashboard' );
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
}
