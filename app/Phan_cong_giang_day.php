<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phan_cong_giang_day extends Model
{
    protected $table = "phan_cong_giang_day";
    protected $fillable = ['giang_vien_id', 'hoc_phan_id', 'lop_id', 'ngay_bat_dau', 'ngay_ket_thuc', 'phong_hoc_id'];


    public function giang_vien()
    {
        return $this->belongsTo(Giang_vien::class);
    }

    public function hoc_phan()
    {
        return $this->belongsTo(Hoc_phan::class);
    }

    public function lop()
    {
        return $this->belongsTo(Lop::class);
    }

    public function phong_hoc()
    {
        return $this->belongsTo(Phong_hoc::class);
    }

    public function get_text_tiet_hoc()
    {
        $buf = "";
        foreach (json_decode($this->tiet_hoc) as $tiet) {
            $buf .= Hoc_phan::getClasses()[$tiet] . ", ";
        }
        return $buf;
    }

    public function get_text_ngay_trong_tuan()
    {
        $buf = "";
        foreach (json_decode($this->ngay_trong_tuan) as $ngay) {
            $buf .= Phan_cong_giang_day::getDayOfWeek()[$ngay] . ", ";
        }
        return $buf;
    }

    public static function getDayOfWeek()
    {
        return ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'];
    }


}
