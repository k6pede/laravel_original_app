<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'month',
        'day',
        'blood',
        'gender',
        'ruby',
        'created_at',
        'updated_at'
    ];


}