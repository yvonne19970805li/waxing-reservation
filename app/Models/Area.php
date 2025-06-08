<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $table = 'areas';

    protected $fillable = [
        'area'
    ];
}
