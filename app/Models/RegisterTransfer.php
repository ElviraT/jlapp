<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegisterTransfer extends Model
{
    use HasFactory;
    protected $table = 'register_transfers';

    protected $fillable = [
        'idProduct','idActivity','idPharmacyT','cantidad'
    ];
    public function Product(): BelongsTo
    {
       return $this->belongsTo(Product::class, 'idProduct');
    }
    public function Pharmacy(): BelongsTo
    {
       return $this->belongsTo(Pharmacy::class, 'idPharmacyT');
    }
    public function ActivityLogF(): HasMany
    {
       return $this->hasMany(ActivityLogF::class, 'idActivity');
    }
}