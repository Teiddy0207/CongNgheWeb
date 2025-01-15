<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = ['club_id', 'name', 'position',  'number', 'birthday'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
