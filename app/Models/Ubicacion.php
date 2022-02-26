<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    // le indicamos el nombre correcto de nuestra tabla
    protected $table = 'ubicaciones';
}
