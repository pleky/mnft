<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    //
    protected $table = 'contents';
    protected $fillable = [
        'menu_id',
        'image',
        'description',
        'created_at',
        'updated_at'
    ];
}
