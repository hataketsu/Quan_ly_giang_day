<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    protected $table = 'nganh';
    protected $fillable = ['name', 'khoa_id', "dao_tao_dh", "dao_tao_cd", "dao_tao_tc", "dao_tao_nghe", "dao_tao_trc"];
    protected $attributes = ['name' => 'Chua co ten','dao_tao_dh'=>'','dao_tao_cd'=>'','dao_tao_tc'=>'','dao_tao_nghe'=>'','dao_tao_trc'=>''];

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

