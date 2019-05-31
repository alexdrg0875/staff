<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes ;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'path'
    ];

    // accsesor for adding images folder to url in view
    protected $uploads = '/images/';
    public function getPathAttribute($photo) {

        return $this->uploads . $photo;

    }
}
