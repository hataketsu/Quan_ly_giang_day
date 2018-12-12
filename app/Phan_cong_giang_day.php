<?php

namespace App;

use Carbon\Carbon;
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

    public function get_so_tiet_hoc()
    {
        $tiet_hocs = json_decode($this->tiet_hoc);
        $ngay_hoc = json_decode($this->ngay_trong_tuan);
        $start = new Carbon($this->ngay_bat_dau);
        $end = new Carbon($this->ngay_ket_thuc);
        $count = 0;
        for ($i = $start; $end->greaterThanOrEqualTo($i); $i->addDay(1)) {
            if (in_array($i->dayOfWeek-1, $ngay_hoc))
                $count++;
        }
        return $count * count($tiet_hocs);
    }
}
