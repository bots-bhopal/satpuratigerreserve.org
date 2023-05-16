<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ntender extends Model
{
    protected $table = 'ntender';

    protected $fillable = [
        'title',
        'original_filename',
        'filename',
        'file_size',
        'url',
        'expired_at'
    ];

    public function ntcategory()
    {
        return $this->belongsToMany(NtCategory::class);
    }
}
