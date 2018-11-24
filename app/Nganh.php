<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    protected $table = 'nganh';

    public function khoa()
    {
        return $this->belongsTo(Khoa::class);
    }
}
