<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    public const CATEGORY_PRIMARY = 'PRIMARY';
    public const CATEGORY_SECONDARY = 'SECONDARY';
    public const CATEGORY_VIEW_ALL_SECONDARY = 'VIEW-ALL-SECONDARY';
    public const LIST_MENU_CATEGORY = [
        self::CATEGORY_PRIMARY, self::CATEGORY_SECONDARY, self::CATEGORY_VIEW_ALL_SECONDARY
    ];

    protected $table = 'menus';
    protected $fillable = [
        'name',
        'slug',
        'status',
        'is_order',
        'created_at',
        'updated_at',
        'category',
    ];
}
