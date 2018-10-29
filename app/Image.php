<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function heroes()
    {
        return $this->belongsToMany('App\Hero', 'hero_image', 'image_id', 'hero_id');
    }
}
