<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strevent extends Model
{
    protected $table = 'strevent';
    protected $fillable = ['title', 'lang', 'status', 'author', 'slug', 'meta_description', 'meta_tags', 'excerpt', 'content', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Admin', 'user_id');
    }
}
