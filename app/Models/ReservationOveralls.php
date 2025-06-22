<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationOveralls extends Model
{
    protected $table = 'reservation_overalls';

    protected $fillable = ['remark', 'status', 'date_id', 'time_id'];
}
