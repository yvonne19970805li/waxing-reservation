<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'acitivities';

    protected $fillable = [
        'acitivity',
        'price',
        'note'
    ];
}
