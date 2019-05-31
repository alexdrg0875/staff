<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Staff extends Model
{
    use SoftDeletes ;

    protected $dates = ['started_at','deleted_at'];

    protected $fillable = [
        'name','user_id','position_id','photo_id','salary', 'parent_id', 'started_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }

    public function parent(){
        return $this->belongsTo('App\Staff', 'parent_id');
    }

    public function children(){
        return $this->hasMany('App\Staff', 'parent_id', 'id');
    }
}
