<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'users_id',
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

}