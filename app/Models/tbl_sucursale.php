<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\Http\Traits\Uuids;

class tbl_sucursale extends Model
{
    use HasFactory;
    use SoftDeletes, Uuids;

    protected $fillable = [
        'nombre',
        'id_estado',
        'id_municipio',
        'id_encargado',
        'id_usuario_reg',
        'calle',
        'interior',
        'exterior',
        'cp',
        'latitud',
        'longitud',
        'comentario',
        'prefijo',
        'activo',
        'encuesta'
    ];
}
