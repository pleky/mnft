<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'about';
    protected $fillable = [
        'name',
        'description',
        'image',
        'mission',
        'created_at',
        'updated_at'
    ];
}
