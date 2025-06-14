<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationDates extends Model
{
    protected $table = 'reservation_dates';

    protected $fillable = [
        'date',
        'text'];
}
