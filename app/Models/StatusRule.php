<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusRule extends Model
{
    //状态关系表
    protected $table = 'status_rule';
    public function children_rule_status()
    {
        return $this->hasOne('App\Models\Status','id','status_id');
    }
    public function parent_rule_status()
    {
        return $this->hasOne('App\Models\status','id','parent_id');
    }
}
