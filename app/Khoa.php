<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = "khoa";
    protected $fillable = ['name'];
    protected $attributes = ['name' => 'Chua co ten'];

    public function nganh()
    {
        return $this->hasMany(Nganh::class);
    }

    public static function get_selects()
    {
        $ids = Khoa::all()->pluck('id');
        $names = Khoa::all()->pluck('name');
        return $ids->combine($names);
    }
}
