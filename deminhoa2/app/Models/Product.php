<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // Các trường có thể được gán giá trị tự động (mass assignable)
    protected $fillable = ['store_id', 'name', 'description', 'price', 'image_path'];

    // Định nghĩa quan hệ n-1 với bảng stores
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path 
            ? asset('storage/' . $this->image_path) 
            : null; // Trả về đường dẫn đầy đủ hoặc null nếu không có ảnh.
    }
}
