<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'rif','razon_social','contacto','sicm_sada', 'segmento', 'correo', 'telefono', 'direccion'
    ];
}