<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentDate extends Model
{
    protected $table = 'appointmentDates';

    protected $fillable = [
        'date',
        'note'
    ];
}
