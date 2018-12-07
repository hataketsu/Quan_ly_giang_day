<?php

namespace App;

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

}
