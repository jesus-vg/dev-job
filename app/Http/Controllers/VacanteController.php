<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacanteStoreUpdateRequest;
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
            ->whereUsuarioId( auth()->user()->id )
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
        // mostramos las imagenes que ya se han subido en el formulario (carpeta temporal)
        $rutaTemporal = 'temp/' . auth()->user()->id . '/vacantes/imagenes';
        $imagenesTemp = Storage::disk( 'public' )->files( $rutaTemporal );

        return view( 'vacantes.create', [
            'categorias'   => Categoria::select( 'id', 'nombre' )->get(),
            'experiencias' => Experiencia::select( 'id', 'nombre' )->get(),
            'ubicaciones'  => Ubicacion::select( 'id', 'nombre' )->get(),
            'salarios'     => Salario::select( 'id', 'nombre' )->get(),
            'imagenesTemp' => $imagenesTemp,
            'vacante'      => new Vacante(),
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( VacanteStoreUpdateRequest $request )
    {
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
     *
     * @link sesiones https://laravel.com/docs/9.x/session#retrieving-data
     */
    public function show( Vacante $vacante )
    {
        // creamos una session para que el usuario pueda postular a la vacante desde el formulario contacto
        session( ['vacante_id' => $vacante->id] );

        return view( 'vacantes.show', [
            'vacante' => $vacante,
        ] );
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
        return view( 'vacantes.edit', [
            'categorias'   => Categoria::select( 'id', 'nombre' )->get(),
            'experiencias' => Experiencia::select( 'id', 'nombre' )->get(),
            'ubicaciones'  => Ubicacion::select( 'id', 'nombre' )->get(),
            'salarios'     => Salario::select( 'id', 'nombre' )->get(),
            'vacante'      => $vacante,
        ] );
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
        $vacante->candidatos()->delete();
        $vacante->delete();

        // eliminamos la carpeta de la vacante
        Storage::disk( 'public' )->deleteDirectory( 'vacantes/' . $vacante->id );

        return response()->json( [
            'success' => $vacante->toArray(),
        ] );
    }

    /**
     * Metodo para subir imagenes.
     * Se utiliza con dropzone.js en crear y actualizar vacante.
     *
     * @param Request $request
     */
    public function imagenUpload( Request $request )
    {
        // Validamos los datos del formulario
        $request->validate( [
            'imagen'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'idVacante' => 'numeric',
        ] );

        if ( $request->idVacante == 0 ) {
            $usuario      = auth()->user();
            $rutaTemporal = 'temp/' . $usuario->id . '/vacantes/imagenes';

            // subimos la imagen al servidor en una carpeta temporal
            $ruta = $request->file( 'imagen' )->store( $rutaTemporal, 'public' );
        } else {
            $rutaImagen = 'vacantes/' . $request->idVacante;
            $ruta       = $request->file( 'imagen' )->store( $rutaImagen, 'public' );

            $vacante = Vacante::findOrFail( $request->idVacante );

            // actualizamos las imágenes
            $imagenes   = json_decode( $vacante->imagen );
            $imagenes[] = $ruta;

            $vacante->imagen = json_encode( $imagenes );
            $vacante->save();
        }

        return response()->json( [
            'mensaje'   => 'ok',
            'path_temp' => $ruta,
        ] );
    }

    /**
     * Metodo para eliminar una imagen.
     * Se utiliza con dropzone.js en crear y actualizar vacante.
     *
     * @param Request $request
     */
    public function imagenDelete( Request $request )
    {
        if ( $request->ajax() ) {

            $request->validate( [
                'imagen'    => 'required|string',
                'idVacante' => 'numeric',
            ] );

            if ( $request->idVacante == 0 ) {
                $user = auth()->user();

                $pathTemp = explode( '/', $request->imagen );

                // validamos que la ruta sea la correcta temp/usuario_id/...
                if ( $pathTemp[0] == 'temp' && $pathTemp[1] == $user->id ) {
                    // eliminamos la imagen del servidor si existe
                    if ( Storage::disk( 'public' )->exists( $request->imagen ) ) {
                        Storage::disk( 'public' )->delete( $request->imagen );
                    }
                }

            } else {

                // eliminamos la imagen del servidor si existe
                if ( Storage::disk( 'public' )->exists( $request->imagen ) ) {
                    Storage::disk( 'public' )->delete( $request->imagen );

                    $vacante = Vacante::findOrFail( $request->idVacante );

                    $imagenesVacante = json_decode( $vacante->imagen ); // convertimos el json a array
                    $imagenesVacante = array_diff( $imagenesVacante, [$request->imagen] ); // eliminamos la imagen del array
                    // volvemos a indexar el array para que no haya problemas con el json ej. "["imagen1", "imagen2"]" y no "{"1":"imagen1", "2":"imagen2"}"
                    $imagenesVacante = array_values( $imagenesVacante );
                    $vacante->imagen = json_encode( $imagenesVacante ); // convertimos el array a json
                    $vacante->save();
                }
            }

            return response()->json( [
                'mensaje' => 'ok',
            ] );
        }
    }

    /**
     * Actualiza el estado de la vacante.
     * @param Vacante $vacante
     * @return \Illuminate\Http\Response
     */
    public function updateEstado(
        Vacante $vacante,
        Request $request
    ) {
        $request->validate( [
            'estado' => 'required|in:0,1',
        ] );

        $vacante->activo = $request->estado;
        $vacante->save();

        return response()->json( [
            'mensaje' => 'ok',
            'estado'  => $vacante->activo,
        ] );
    }
}
