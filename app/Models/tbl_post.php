<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class tbl_post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'img_portada',
        'cuerpo',
        'key_words',
        'descripcion',
        'slug',
        'categoria',
        'tags',
        'vistas',
        'status',
    ];
}
