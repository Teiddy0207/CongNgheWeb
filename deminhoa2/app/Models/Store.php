<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    // Các trường có thể được gán giá trị tự động (mass assignable)
    protected $fillable = ['name', 'address', 'phone'];

    // Định nghĩa quan hệ 1-n với bảng products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
