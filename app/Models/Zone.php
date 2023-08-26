<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zone extends Model
{
    use HasFactory;
    protected $table = 'zones';

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'idCity');
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'idState');
    }
    public function UserZone(): HasMany
    {
        return $this->hasMany(UserZone::class, 'idZone');
    }
    public function Medical(): BelongsTo
    {
        return $this->belongsTo(Medical::class, 'id');
    }
    public function Pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class, 'id');
    }
}
