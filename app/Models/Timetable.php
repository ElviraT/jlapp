<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetables';

    protected $fillable = [
        'idMedical',
        'monday',
        'start_time_Mon',
        'end_time_Mon',
        'tuesday',
        'start_time_Tue',
        'end_time_Tue',
        'wednesday',
        'start_time_Wed',
        'end_time_Wed',
        'thursday',
        'start_time_Thu',
        'end_time_Thu',
        'friday',
        'start_time_Fri',
        'end_time_Fri',
        'saturday',
        'start_time_Sat',
        'end_time_Sat',
        'sunday',
        'start_time_Sun',
        'end_time_Sun',
    ];
}
