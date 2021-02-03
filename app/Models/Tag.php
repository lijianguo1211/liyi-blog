<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $fillable = [
        'tag_name',
        'tag_url',
        'tag_parent',
        'tag_type',
        'tag_sort',
        'tag_status',
    ];
}
