<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medical extends Model
{
    use HasFactory;
    protected $table = 'medicals';

    protected $fillable = [
        'name',
        'last_name',
        'email',
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

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class, 'idZone');
    }
    public function Specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class, 'idSpecialty');
    }
}
