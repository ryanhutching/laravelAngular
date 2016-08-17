<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name','email','last_name','phone_number','address','lat','long', 'photo','role','status','account_type','password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user record associated with the club.
     */
    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

}
