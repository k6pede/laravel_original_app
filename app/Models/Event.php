<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'event_name',
        'user_id',
        'character_id',
        'created_at',
        'updated_at'
    ];
}
