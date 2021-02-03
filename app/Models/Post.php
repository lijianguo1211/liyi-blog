<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'post_url',
        'post_type',
    ];

    public function postDetail()
    {
        return $this->hasOne(PostDetail::class, 'post_id');
    }
}
