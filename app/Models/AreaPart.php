<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaPart extends Model
{
    protected $table = 'areaParts';

    protected $fillable = [
        'part',
        'price',
        'note'
    ];
}
