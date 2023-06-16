<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ActivityLogF extends Model
{
   use HasFactory;
   protected $table = 'activity_log_fs';

   protected $fillable = [
      'idPharmacy', 'observations', 'jornada', 'pedido'
   ];
   public function RegisterTransfer(): HasMany
   {
      return $this->hasMany(RegisterTransfer::class, 'idActivity');
   }
   public function RegisterWorkingday(): HasOne
   {
      return $this->hasOne(RegisterWorkingday::class, 'idActivity');
   }
   public function Pharmacy(): BelongsTo
   {
      return $this->belongsTo(Pharmacy::class, 'idPharmacy');
   }
}
