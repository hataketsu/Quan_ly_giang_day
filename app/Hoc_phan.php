<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoc_phan extends Model
{
    protected $table = 'hoc_phan';
    protected $fillable = ['ten', 'khoa_dao_tao_id', 'mon_hoc_id', 'tin_chi_ly_thuyet', 'tin_chi_thuc_hanh'];

    public static function get_selects()
    {
        $ids = Hoc_phan::all()->pluck('id');
        $names = Hoc_phan::all()->pluck('ten');
        return $ids->combine($names);
    }

    public function khoa_dao_tao()
    {
        return $this->belongsTo(Khoa_dao_tao::class);
    }

    public function mon_hoc()
    {
        return $this->belongsTo(Mon_hoc::class);
    }

    public static function getClasses()
    {
        return ['Tiết 1', 'Tiết 2', 'Tiết 3', 'Tiết 4', 'Tiết 5', 'Tiết 6', 'Tiết 7', 'Tiết 8', 'Tiết 9', 'Tiết 10'];
    }


}
