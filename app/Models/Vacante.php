<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use League\CommonMark\Normalizer\SlugNormalizer;

class Vacante extends Model
{
    use HasFactory, Sluggable;

    /**
     * @var array
     */
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id',
        'imagen',
        'skills',
    ];

    /**
     * Indicamos que se usará el campo slug en lugar del campo id para buscarlo en la base de datos
     * @return string
     * @link model-binding https://aprendible.com/series/laravel-desde-cero/lecciones/route-model-binding
     * @see https://laravel.com/docs/9.x/routing#customizing-the-key
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     *
     * @return array
     * @see https://github.com/cviebrock/eloquent-sluggable
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'titulo', // el campo que se va a usar para generar el slug
            ],
        ];
    }

    /**
     * Relacionamos las vacantes con categoria
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo( Categoria::class, 'categoria_id' );
    }

    /**
     * Relacionamos las vacantes con experiencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function experiencia()
    {
        return $this->belongsTo( Experiencia::class, 'experiencia_id' );
    }

    /**
     * Relacionamos las vacantes con ubicacion
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubicacion()
    {
        return $this->belongsTo( Ubicacion::class, 'ubicacion_id' );
    }

    /**
     * Relacionamos las vacantes con salario
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salario()
    {
        return $this->belongsTo( Salario::class, 'salario_id' );
    }

    /**
     * Relacionamos las vacantes con usuario
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo( User::class, 'usuario_id' );
    }

}
