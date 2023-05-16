<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NtCategory extends Model
{
    protected $table = 'ntcategory';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function ntender()
    {
        return $this->belongsToMany(Ntender::class);
    }
}
