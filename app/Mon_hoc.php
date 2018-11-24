<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mon_hoc extends Model
{
    protected $fillable = ['name'];
    protected $table = 'mon_hoc';
    protected $attributes=['name'=>'Chua co ten'];
}
