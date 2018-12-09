<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Giang_vien extends Model
{
    protected $table = 'giang_vien';
    protected $fillable = ['ten', 'chuyen_mon', 'chuc_vu', 'ngay_sinh', 'gioi_tinh', 'dien_thoai', 'khoa_id'];

    public static function get_selects()
    {
        $ids = Giang_vien::all()->pluck('id');
        $names = Giang_vien::all()->pluck('ten');
        return $ids->combine($names);
    }

    public function khoa()
    {
        return $this->belongsTo(Khoa::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function phan_cong_giang_day()
    {
        return $this->hasMany(Phan_cong_giang_day::class);
    }

    public function so_tiet_day()
    {
        $tiet_hoc = 0;
        $phan_cong = $this->phan_cong_giang_day()->whereDate('ngay_bat_dau', '<=', Carbon::now())->whereDate('ngay_ket_thuc', '>=', Carbon::now())->get();
        foreach ($phan_cong as $p) {
            $tiet_hoc += $p->get_so_tiet_hoc();
        }
        return $tiet_hoc;
    }

    public function so_mon_day()
    {
        $mon_hoc = collect();
        $phan_cong = $this->phan_cong_giang_day()->whereDate('ngay_bat_dau', '<=', Carbon::now())->whereDate('ngay_ket_thuc', '>=', Carbon::now())->get();
        foreach ($phan_cong as $p) {
            $mon_hoc = $mon_hoc->concat([$p->hoc_phan->mon_hoc]);
        }
        $mon_hoc = $mon_hoc->unique();
        return $mon_hoc->count();
    }


}
