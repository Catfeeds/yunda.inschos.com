<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusGroup extends Model
{
    //状态分组表
    protected $table = 'status_group';


    public function group_status()
    {
        return $this->hasMany('App\Models\Status','group_id','id');
    }
}
