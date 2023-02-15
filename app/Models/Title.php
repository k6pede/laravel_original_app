<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id',
        'title',
        'title_ruby',
        'authour',
        'publicher',
        'publication_magazine',
        'created_at',
        'updated_at'

        
    ];
}
