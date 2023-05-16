<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboard extends Model
{
    protected $table = 'aboard';

    protected $fillable = [
        'title',
        'original_filename',
        'filename',
        'file_size',
        'url',
        'expired_at'
    ];

    public function AbCategory()
    {
        return $this->belongsToMany(AbCategory::class);
    }
}
