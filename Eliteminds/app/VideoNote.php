<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoNote extends Model
{

    public $table = 'video_notes';
    protected $fillable = [
        'note', 'video_id', 'user_id'
    ];
}
