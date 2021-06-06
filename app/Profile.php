<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profiles';
    protected $fillable = [
        'company_name',
        'address',
        'phone',
        'email',
        'website',
        'created_at',
        'updated_at'
    ];

}
