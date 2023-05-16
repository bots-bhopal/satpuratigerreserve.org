<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthPhoto extends Model
{
    protected $table = 'month_photos';
    protected $fillable = ['image', 'name', 'lang'];
}
