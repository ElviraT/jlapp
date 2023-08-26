<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserZone extends Model
{
    use HasFactory;
    protected $table = 'user_zones';

    public function Zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class, 'idZone');
    }
    public function User(): HasMany
    {
        return $this->hasMany(User::class, 'idUser');
    }
}
