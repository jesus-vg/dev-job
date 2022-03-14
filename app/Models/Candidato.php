<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'nombre',
        'email',
        'cv',
    ];
}
