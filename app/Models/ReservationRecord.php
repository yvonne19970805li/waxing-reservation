<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservationRecord extends Model
{
    protected $table = 'reservationRecords';

    protected $fillable = [
        'line_id',
        'appointmentDate_id',
        'appointmentDate',
        'appointmentTime_id',
        'appointmentTime',
        'areaPart_id',
        'areaPart',
    ];
}
