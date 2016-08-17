<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /** @var string $table  */
    protected $table = 'types';

    /** @var array $fillable  */
    protected $fillable = [
        'name', 'key'
    ];

    /** */
    public function club() {
        return $this->belongsToMany(Club::class);
    }
}


















