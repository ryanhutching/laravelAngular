<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadiums extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name','description', 'address','lat','long', 'photo','phone'
    ];

    /**
     *
    */
    public function club() {
        return $this->hasMany(Club::class,'stadium_id');
    }
}
