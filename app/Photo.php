<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path'
    ];

    // accsesor for adding images folder to url in view
    public function getPathAttribute($photo) {

        return $this->uploads . $photo;

    }
}
