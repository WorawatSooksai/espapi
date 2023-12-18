<?php

namespace App\Models;

class Log extends Model
{
    // 
    protected $fillable = [
        'variable_id', 'v_integer', 'v_double','v_string','created_at'
    ];
}
