<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\Http\Traits\Uuids;

class tbl_encuesta extends Model
{
    use HasFactory;
    use SoftDeletes, Uuids;

    protected $fillable = [
       'id_sucursal',
        'id_tipo_encuesta',
        'api_token',
    ];
}
