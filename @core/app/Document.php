<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use Sluggable;

    protected $table = 'documents';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'file',
        'original_filename',
        'filename',
        'file_size',
        'file_extension',
        'lang',
        'status'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Admin', 'user_id');
    }
}
