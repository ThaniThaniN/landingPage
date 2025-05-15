<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded  = [
        'name'
    ];
    protected $casts = [
        'cards' => 'array',
    ];

}
