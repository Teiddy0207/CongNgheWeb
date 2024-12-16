<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class computer extends Model
{
    use HasFactory;
    protected $fillable = [
        'computers_name',
        'model',
        'operating_system',
        'processor',
        'memory',
        'available'
    ];
}
