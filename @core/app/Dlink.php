<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlink extends Model
{
    protected $table = 'dlinks';

    protected $fillable = [
        'title',
        'original_filename',
        'filename',
        'file_size',
        'url',
        'expired_at'
    ];

    public function dlcategory()
    {
        return $this->belongsToMany(DlCategory::class);
    }
}
