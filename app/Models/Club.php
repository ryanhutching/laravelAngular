<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Club extends Model
{
    /** @var string $table  */
    protected $table = 'clubs';

    /** @var array $fillable  */
    protected $fillable = [
        'logo', 'name', 'short_name', 'description', 'user_id', 'stadium_id', 'phone', 'address','lat','long', 'home_page'
    ];


    /** Return All Clubs With All Relations */
    public function getAllClubs() {
        $clubs = DB::table('clubs')
            ->join('stadiums', 'clubs.stadium_id', '=', 'stadiums.id')
            ->join('teams', 'clubs.id', '=', 'teams.club_id')
            ->select('clubs.*', 'teams.*', 'stadiums.*')
            ->get();
        return $clubs;
    }

    /**
     * Relation with User
    */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with Team
     */
    public function team() {
        return $this->hasMany(Team::class);
    }

    /**
     * Relation with stadiums
    */
    public function stadium() {
        return $this->belongsTo(Stadiums::class,'stadium_id');
    }

}






























