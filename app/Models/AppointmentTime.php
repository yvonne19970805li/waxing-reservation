<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentTime extends Model
{
    protected $table = 'appointmentTimes';

    protected $fillable = [
        'time',
        'note'
    ];
}
