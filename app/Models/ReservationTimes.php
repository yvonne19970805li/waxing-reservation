<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationTimes extends Model
{
    use SoftDeletes;

    protected $table = 'reservation_times';

    protected $fillable = [ 'time' , 'remark',];
}
