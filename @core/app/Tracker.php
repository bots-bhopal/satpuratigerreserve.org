<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    public $attributes = ['hits' => 0];

    protected $fillable = ['ip', 'date', 'browser'];

    public $timestamps = true;

    protected $table = 'trackers';

    public static function boot()
    {
        parent::boot();
        // When a new instance of this model is created...
        static::creating(function ($tracker) {
            $tracker->hits = 0;
        });

        // Any time the instance is saved (create OR update)
        static::saving(function ($tracker) {
            $tracker->visit_date = date('Y-m-d');
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        });
    }

    // Fill in the IP and today's date
    public function scopeCurrent($query)
    {
        return $query->where('ip', $_SERVER['REMOTE_ADDR'])
            ->where('date', date('Y-m-d'));
    }

    public static function hit()
    {
        static::firstOrCreate([
            'ip'   => $_SERVER['REMOTE_ADDR'],
            'date' => date('Y-m-d'),
            'browser' => $_SERVER['HTTP_USER_AGENT'],
        ])->save();
    }
}

Tracker::hit();
