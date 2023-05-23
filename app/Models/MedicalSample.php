<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalSample extends Model
{
    use HasFactory;
    protected $fillable = [
        'idProduct','idActivity','cantidad'
    ];

    public function Product(): BelongsTo
    {
       return $this->belongsTo(Product::class, 'idProduct');
    }
    public function Activity(): HasMany
    {
       return $this->hasMany(Activity::class, 'idActivity');
    }
}