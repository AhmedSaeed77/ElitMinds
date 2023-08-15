<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoRate extends Model
{
    public $table = 'video_rates';
    protected $fillable = [
        'comment', 'video_id', 'user_id', 'rate'
    ];
}
