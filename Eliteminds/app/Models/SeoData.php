<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoData extends Model
{
    protected $guarded = [];
    public $table = 'seodata';

    public $fillable = [
        'post_id',
        'meta_title',
        'meta_description',
        'keywords'
    ];

    public $transcodeColumns = [
        'keywords',
        'meta_description',
        'meta_title',
    ];
}
