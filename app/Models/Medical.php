<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medical extends Model
{
    use HasFactory;
    protected $table = 'medicals';

    protected $fillable = [
        'name',
        'last_name',
        'idSpecialty',
        'idZone',
        'idModality',
        'numero_colegio',
        'matricula',
        'direccion',
        'status',
    ];
    public function Activity(): HasMany
    {
       return $this->hasMany(Activity::class, 'id');
    }
}