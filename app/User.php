<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Carbon\Carbon;

class User extends Authenticatable
{
    use EntrustUserTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $dates = [
        'created_at', 'updated_at',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function getRolAttribute(){
        if($this->roles)
            return $this->roles()->first();
    }
}
