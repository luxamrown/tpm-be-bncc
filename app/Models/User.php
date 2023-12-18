<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nickname','username','followerCount', 'followingCount'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
