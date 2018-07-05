<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    
    protected $table = 'positions';

    protected $fillable = [
        'pos_id', 'dept_id', 'pos_name'
    ];

}
