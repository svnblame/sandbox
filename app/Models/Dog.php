<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = [
        'name', 'breed', 'age', 'color', 'weight'
    ];
}
