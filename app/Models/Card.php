<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Card extends Model
{
    protected $guarded = [
        //responsible admin
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
