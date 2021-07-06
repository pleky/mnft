<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryHistory extends Model
{
    //
    protected $table = 'gallery_history';
    protected $fillable = [
        'title',
        'image',
        'status',
        'created_at',
        'updated_at'
    ];
}
