<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    // start_atをCarbonインスタンスとして取得できるように設定
    protected $dates = [
        'start_at',
    ];

    protected $fillable = [
        'user_id',
        'character_id',
        'start_at',
        'end_at',
        'title',
        'description',
        'created_at',
        'updated_at'
    ];
}
