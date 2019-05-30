<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path'
    ];

    // accsesor for adding images folder to url in view
    protected $uploads = '/images/';
    public function getPathAttribute($photo) {

        return $this->uploads . $photo;

    }
}
