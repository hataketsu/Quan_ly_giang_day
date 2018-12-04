<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong_hoc extends Model
{
    protected $table = 'phong_hoc';
    protected $fillable = ['ten', 'so_ban', 'dia_diem'];

    public static function get_selects()
    {
        $ids = Phong_hoc::all()->pluck('id');
        $names = Phong_hoc::all()->pluck('ten');
        return $ids->combine($names);
    }
}
