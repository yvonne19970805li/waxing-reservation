<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationDates extends Model
{
    use SoftDeletes;
    
    protected $table = 'reservation_dates';

    protected $fillable = [
        'date',
        'remark'];
}
