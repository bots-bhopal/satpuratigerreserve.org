<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tender extends Model
{
    use Sluggable;

    protected $table = 'tenders';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'last_date',
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
