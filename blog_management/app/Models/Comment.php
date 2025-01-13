<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['post_id', 'comment'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
