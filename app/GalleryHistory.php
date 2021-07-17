<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryHistory extends Model
{
    //
    protected $table = 'gallery_history';
    protected $fillable = [
        'title',
        'description',
        'image',
        'photo_1',
        'photo_2',
        'photo_3',
        'status',
        'created_at',
        'updated_at'
    ];
}
