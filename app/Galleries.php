<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    //
    protected $table = 'galleries';
    protected $fillable = [
        'content_id',
        'title',
        'image',
        'created_at',
        'updated_at'
    ];
}
