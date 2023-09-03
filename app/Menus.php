<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    public const CATEGORY_PRIMARY = 'PRIMARY';
    public const CATEGORY_SECONDARY = 'SECONDARY';

    public const ADDITIONAL_INFO_SECONDARY_PARENT = "secondary-parent";
    public const ADDITIONAL_INFO_SUBSUBMENU = "subsubmenu";

    public const LIST_MENU_CATEGORY = [
        self::CATEGORY_PRIMARY, self::CATEGORY_SECONDARY
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
