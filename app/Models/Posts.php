<?php

namespace App\Models;

use App\Http\Controllers\CommentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'blog_posts';

    use HasFactory;
    protected $fillable = [
        'title',
        'post',
        'user_id',
        'category_id',
        'image'
    ];
    public function comments()
    {
        return $this->hasMany(CommentController::class);
    }
    public function category()
    {
        return $this->belongsToMany('App\Http\CategoryController', 'category_post', 'post_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Http\User');
    }
}
