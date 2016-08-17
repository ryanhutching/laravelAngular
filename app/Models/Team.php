<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'club_id','stadium_id', 'type'
    ];

    /**
     * Relation with Club
     */
    public function club() {
        return $this->belongsTo(Club::class);
    }
}
