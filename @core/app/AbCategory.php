<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbCategory extends Model
{
    protected $table = 'abcategory';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function aboard()
    {
        return $this->belongsToMany(Aboard::class);
    }
}
