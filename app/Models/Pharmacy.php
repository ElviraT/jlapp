<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    public function RegisterTransfer(): HasMany
    {
        return $this->hasMany(RegisterTransfer::class, 'idPharmacyT');
    }
    public function Contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'idPharmacy');
    }
}
