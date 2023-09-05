<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalSample extends Model
{
    use HasFactory;
    protected $table = 'medical_samples';
    protected $fillable = [
        'idProduct', 'idActivity', 'cantidad', 'product', 'medico'
    ];

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'idProduct');
    }
    // public function Medical(): BelongsTo
    // {
    //    return $this->belongsTo(Medical::class, 'idPharmacyT');
    // }
    public function Activity(): HasMany
    {
        return $this->hasMany(Activity::class, 'idActivity');
    }
}
