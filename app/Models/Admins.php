<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';

    protected $fillable = [];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
