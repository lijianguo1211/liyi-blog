<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use HasFactory;

    public $fillable = [
        'post_id',
        'post_title',
        'post_key_word',
        'post_status',
        'is_top',
        'source',
        'post_excerpt',
        'post_content',
        'post_date',
    ];
}
