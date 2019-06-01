<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  SoftDeletes ;

    protected $dates = ['deleted_at'];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo_id','role_id','is_active','name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }


    public function isAdmin() {
        if($this->role_id) {
            if($this->role->name == "administrator" && $this->is_active == 1) {
                return true;
            }
        }
        return false;
    }

    public function isUser() {
        if($this->role_id) {
            if($this->role && $this->is_active == 1) {
                return true;
            }
        }
        return false;
    }
}
