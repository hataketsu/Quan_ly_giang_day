<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'lop';
    protected $fillable = ['ten','khoa_dao_tao_id','so_sinh_vien'];

    public static function get_selects()
    {
        $ids = Lop::all()->pluck('id');
        $names = Lop::all()->pluck('ten');
        return $ids->combine($names);
    }
    public function khoa_dao_tao()
    {
        return $this->belongsTo(Khoa_dao_tao::class);
    }
}
