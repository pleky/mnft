<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutDetail extends Model
{
    //
    protected $table = 'about_detail';
    protected $fillable = [
        'about_id',
        'title',
        'image',
        'type',
        'created_at',
        'updated_at'
    ];
}
