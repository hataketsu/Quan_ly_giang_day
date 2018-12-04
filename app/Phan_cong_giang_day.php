<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phan_cong_giang_day extends Model
{
    protected $table = "phan_cong_giang_day";
    protected $fillable = ['giang_vien_id', 'hoc_phan_id', 'lop_id', 'ngay_day','phong_hoc_id'];


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

}
