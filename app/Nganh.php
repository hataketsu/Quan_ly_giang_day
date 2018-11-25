<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    protected $table = 'nganh';
    protected $fillable = ['name', 'khoa_id'];
    protected $attributes = ['name' => 'Chua co ten'];

    public function khoa()
    {
        return $this->belongsTo(Khoa::class);
    }
    public static function get_selects()
    {
        $ids = Nganh::all()->pluck('id');
        $names = Nganh::all()->pluck('name');
        return $ids->combine($names);
    }
}

