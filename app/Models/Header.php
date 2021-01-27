<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    public $guarded = [];

    public static function boot()
    {
        parent::boot();

        $cacheClear = function () {
          \Cache::tags(config('cache.cacheManage.header.tag'))->forget(config('cache.cacheManage.header.key'));
        };

        static::created(function ($model) use ($cacheClear) {
            $cacheClear();
        });
        static::saved(function ($model) use ($cacheClear) {
            $cacheClear();
        });
    }
}
