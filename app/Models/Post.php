<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'content',
        'user_id'
    ];

    public function userInformation() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
