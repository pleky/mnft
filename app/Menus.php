<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    protected $table = 'menus';
    protected $fillable = [
        'name',
        'slug',
        'status',
        'created_at',
        'updated_at'
    ];
}
