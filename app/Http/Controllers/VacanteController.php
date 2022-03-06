<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Experiencia;
use App\Models\Salario;
use App\Models\Ubicacion;
use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::select( 'id', 'titulo', 'slug', 'categoria_id', 'activo', 'created_at' )
            ->whereUserId( auth()->user()->id )
            ->paginate( 5, ['*'], 'vacantes' );

        return view( 'vacantes.index', [
            'vacantes' => $vacantes,
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

        // mostramos las imagenes que ya se han subido en el formulario (carpeta temporal)
        $rutaTemporal = 'temp/' . auth()->user()->id . '/vacantes/imagenes';
        $imagenesTemp = Storage::disk( 'public' )->files( $rutaTemporal );

        return view( 'vacantes.create', [
            'categorias'   => $catagorias,
            'experiencias' => $experiencias,
            'ubicaciones'  => $ubicaciones,
            'salarios'     => $salarios,
            'imagenesTemp' => $imagenesTemp,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $request->validate(
            [
                'titulo'      => 'required|string|max:255',
                'descripcion' => 'required|string|min:50',
                'categoria'   => 'required|integer',
                'experiencia' => 'required|integer',
                'ubicacion'   => 'required|integer',
                'salario'     => 'required|integer',
                'imagen'      => 'required|json|min:25',
                'skills'      => 'required|string|min:5|max:255',
            ],
            [
                'imagen.required' => 'Seleccione una imagen',
                // Personalizamos el mensaje de error para cuando los caracteres sean menores a 25
                // se valida en caso de que se manipule el json ya que un valor esperado es (minimo 1 archivo):
                // "[
                //         "temp/1/vacantes/imagenes/xzicLDofoUJtaSZ2H9APwxI3ublCxWi46G6tGi9A.png",
                //         "temp/1/vacantes/imagenes/YVw0rxd1CqS0A16EiiEiBDYdoqBLJxa1aGB0NAu5.png"
                // ]"
                'imagen.min'      => 'Seleccione una imagen',
                'skills.min'      => 'Seleccione minimo 3 skills',
            ]
        );

        // guardamos la vacante y recuperamos los datos de la vacante incluyendo el id generado
        $vacanteCreada = auth()->user()->vacantes()->create( [
            'titulo'         => $request->titulo,
            'descripcion'    => $request->descripcion,
            'categoria_id'   => $request->categoria,
            'experiencia_id' => $request->experiencia,
            'ubicacion_id'   => $request->ubicacion,
            'salario_id'     => $request->salario,
            'imagen'         => '',
            'skills'         => $request->skills,
        ] );

        $imagenes = json_decode( $request->imagen );

        $rutaVacante = 'vacantes/' . $vacanteCreada->id;

        $this->moverArchivos( $imagenes, $rutaVacante );

        foreach ( $imagenes as $key => $ruta ) {
            $nombre_imagen  = basename( $ruta );
            $imagenes[$key] = $rutaVacante . '/' . $nombre_imagen;
        }

        $vacanteCreada->imagen = json_encode( $imagenes );
        $vacanteCreada->save();

        return redirect()
            ->route( 'vacantes.index' )
            ->with( 'success', 'Vacante creada correctamente' );
    }

    /**
     * @param array  $archivos
     * @param string $rutaDestino
     */
    private function moverArchivos(
        array $archivos,
        string $rutaDestino
    ) {
        // agregamos / a $rutaDestino por si falta
        $rutaDestino = rtrim( $rutaDestino, '/\\' ) . '/';

        foreach ( $archivos as $ruta ) {
            $nombreArchivo = basename( $ruta );

            if ( Storage::disk( 'public' )->exists( $ruta ) ) {
                Storage::disk( 'public' )
                    ->move(
                        $ruta,
                        $rutaDestino . $nombreArchivo
                    );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vacante $vacante
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Vacante $vacante )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vacante $vacante
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Vacante $vacante )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vacante      $vacante
     *
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
     * @param \App\Models\Vacante $vacante
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Vacante $vacante )
    {
        //
    }

    /**
     * Metodo para subir imagenes.
     * Se utiliza unicamente al crear una nueva vacante
     *
     * @param Request $request
     */
    public function imagenUpload( Request $request )
    {
        // Validamos los datos del formulario
        $request->validate( [
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ] );

        $usuario = auth()->user();

        $rutaTemporal = 'temp/' . $usuario->id . '/vacantes/imagenes';

        // subimos la imagen al servidor en una carpeta temporal
        $ruta = $request->file( 'imagen' )->store( $rutaTemporal, 'public' );

        return response()->json( [
            'mensaje'   => 'ok',
            'path_temp' => $ruta,
        ] );
    }

    /**
     * Metodo para eliminar una imagen
     *
     * @param Request $request
     */
    public function imagenDelete( Request $request )
    {
        if ( $request->ajax() ) {

            $request->validate( [
                'imagen' => 'required|string',
            ] );

            $user = auth()->user();

            $pathTemp = explode( '/', $request->imagen );

            // validamos que la ruta sea la correcta temp/usuario_id/...
            if ( $pathTemp[0] == 'temp' && $pathTemp[1] == $user->id ) {
                // eliminamos la imagen del servidor si existe
                if ( Storage::disk( 'public' )->exists( $request->imagen ) ) {
                    Storage::disk( 'public' )->delete( $request->imagen );
                }
            }

            return response()->json( [
                'mensaje' => 'ok',
            ] );
        }
    }
}
