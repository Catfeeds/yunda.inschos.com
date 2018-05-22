<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NodeCondition extends Model
{
    //节点条件表
    protected $table = 'node_condition';

    public function node_condition_status()
    {
        return $this->hasOne('App\Models\Status','id','status_id');
    }

}
