<?php

namespace Modules\BlogExtension\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;

class Comment extends Model
{
    protected $table = 'blog__comments';
    protected $fillable = ['nickname', 'email', 'comment_text', 'blog_post_id', 'comment_parent_id', 'is_active'];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'blog_post_id');
    }

    public function replies(){

        return $this->hasMany(Comment::class, 'comment_parent_id');
    }
}
