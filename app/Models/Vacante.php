<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use League\CommonMark\Normalizer\SlugNormalizer;

class Vacante extends Model
{
    use HasFactory, Sluggable;

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

}
