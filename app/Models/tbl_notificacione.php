<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_notificacione extends Model
{
    protected $fillable = [
        'destinatario',
        'id_emisor',
        'id_receptor',
        'notificacion',
        'visto',
        'id_lead',
        'id_venta',
        'fecha_vista',
        'url',
    ];
}
