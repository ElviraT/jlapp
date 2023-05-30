<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegisterWorkingday extends Model
{
    use HasFactory;
    protected $table = 'register_workingdays';

    protected $fillable = [
        'idActivity','desde','hasta'
    ];

    public function ActivityLogF(): BelongsTo
    {
       return $this->belongsTo(ActivityLogF::class, 'idActivity');
    }

}