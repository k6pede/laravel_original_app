<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSubscriber extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $keyType = 'unsignedBigInteger';

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected $fillable = [
        'user_id',
    ];
}
