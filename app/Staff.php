<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
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
        return $this->belongsTo('App\Staff');
    }

    public function children(){
        return $this->hasMany('App\Staff', 'parent_id', 'id');
    }
}
