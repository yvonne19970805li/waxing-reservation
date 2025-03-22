<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line_id extends Model
{
    protected $table = 'line_ids';

    protected $fillable = [
        '$name',
        '$email',
        '$password',
        '$line_id'
    ];

    protected $hidden = [
        'password'
    ];
}
