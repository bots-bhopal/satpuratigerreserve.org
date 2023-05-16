<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DlCategory extends Model
{
    protected $table = 'dlcategory';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function dlinks()
    {
        return $this->belongsToMany(Dlink::class);
    }
}
