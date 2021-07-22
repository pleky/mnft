<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    //
    protected $table = 'galleries';
    protected $fillable = [
        'content_id',
        'is_order',
        'image',
        'created_at',
        'updated_at'
    ];
}
