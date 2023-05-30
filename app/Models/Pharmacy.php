<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pharmacy extends Model
{
    use HasFactory;
    protected $table = 'pharmacies';

    protected $fillable = [
        'name',
        'rif',
        'sada',
        'sicm',
        'dicm',
        'telefono',
        'direccion',
        'idZone',
        'status',
    ];
    public function ActivityLogF(): HasMany
    {
       return $this->hasMany(ActivityLogF::class, 'id');
    }
}