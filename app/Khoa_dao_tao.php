<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa_dao_tao extends Model
{
    protected $table = 'khoa_dao_tao';
    protected $fillable = ['ten', 'nganh_id', 'nam_nhap', 'so_nam_dao_tao'];
    protected $attributes = ['ten' => 'Chua co ten'];

    public function nganh()
    {
        return $this->belongsTo(Nganh::class);
    }

    public static function get_selects()
    {
        $ids = Khoa_dao_tao::all()->pluck('id');
        $names = Khoa_dao_tao::all()->pluck('ten');
        return $ids->combine($names);
    }
}
