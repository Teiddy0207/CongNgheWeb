<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';

    protected $fillable = ['name', 'stadium', 'city'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
