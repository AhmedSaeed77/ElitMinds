<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = 'books';
    public $primaryKey = 'id';
    public $timestamps = true;

    public $fillable = [
        'name',
        'slug',
        'description',
        'original_price',
        'price',
        'discount',
        
        'extension_price',
        'book_link',
       
        'img_large',
        'img_small',
        'img',
        'popular',
        'num_exams',
        'num_questions',
        'titleEditorAr',
        'titleEditor',
    ];

    public $transcodeColumns = [
        'name',
        'description',
        
    ];
}
