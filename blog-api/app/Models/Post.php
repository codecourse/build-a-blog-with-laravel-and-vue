<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::creating(function (Post $post) {
            $post->uuid = Str::uuid();

            if (!$post->slug) {
                $post->slug = $post->uuid;
            }
        });
    }

    protected $fillable = [
        'uuid',
        'title',
        'body',
        'slug',
        'teaser',
        'published'
    ];
}
