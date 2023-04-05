<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    use HasFactory;

    protected $fillable = [
        'name',
        'post_id'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Https\Posts');
    }
}
