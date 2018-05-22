<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //状态表
    protected $table = 'status';
    public function status_group()
    {
        return $this->belongsTo('App\Models\StatusGroup','group_id','id');
    }
    public function status_field()
    {
        return $this->hasOne('App\Models\TableField','id','field_id');
    }
}
