<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $fillable = [
        'idMedico', 'observations', 'pedido'
    ];

    public function MedicalSample(): HasMany
    {
        return $this->hasMany(MedicalSample::class, 'idActivity');
    }
    public function Medical(): BelongsTo
    {
        return $this->belongsTo(Medical::class, 'idMedico');
    }
}
