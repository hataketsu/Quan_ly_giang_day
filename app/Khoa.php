<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = "khoa";

    public function nganh()
    {
        return $this->hasMany(Nganh::class);
    }
}
