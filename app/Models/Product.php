<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'quantity_tf'
    ];

    public function MedicalSample(): BelongsTo
    {
        return $this->belongsTo(MedicalSample::class, 'idProduct');
    }
}
