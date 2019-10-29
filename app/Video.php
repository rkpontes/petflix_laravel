<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $timestamps = false;


    protected $fillable = [
        'title', 'description', 'slug', 'youtube_id', 'image', 'featured', 'activated', 'created_at', 'category_id'
    ];

    
}
