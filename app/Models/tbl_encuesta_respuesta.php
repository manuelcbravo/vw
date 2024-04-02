<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\Http\Traits\Uuids;

class tbl_encuesta_respuesta extends Model
{
    use HasFactory;
    use SoftDeletes, Uuids;

    protected $fillable = [
       'id_lead',
        'id_tratamiento',
        'id_encuesta_pregunta',
        'id_encuesta'
        'respuesta',
        'especificar',
    ];
}
