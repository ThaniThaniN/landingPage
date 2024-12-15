<?php

namespace App\Models;

use Database\Factories\SuggestionRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestionRequest extends Model
{
    /** @use HasFactory<SuggestionRequestFactory> */
    use HasFactory;

    protected $table = 'suggestion_requests';

    protected $guarded = [];
}
