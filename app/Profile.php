<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profiles';
    protected $fillable = [
        'company_name',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'instagram',
        'youtube',
        'facebook',
        'created_at',
        'updated_at',
    ];

}
