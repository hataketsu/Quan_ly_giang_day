<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mon_hoc extends Model
{
    protected $table = 'mon_hoc';
    protected $fillable = ['name'];
    protected $attributes = ['name' => 'Chua co ten'];

    public static function get_selects()
    {
        $ids = Mon_hoc::all()->pluck('id');
        $names = Mon_hoc::all()->pluck('name');
        return $ids->combine($names);
    }
}
