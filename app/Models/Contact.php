<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $fillable = [
        'idPharmacy',
        'name',
        'last_name',
        'telephone',
        'telephone2'
    ];

    public function Pharmacy(): HasOne
    {
        return $this->hasOne(Pharmacy::class, 'id');
    }
}
