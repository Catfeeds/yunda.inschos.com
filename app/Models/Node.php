<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //节点表
    protected $table = 'node';
    //节点关联工作流
    public function node_flow()
    {
        return $this->belongsTo('App\Models\Flow','flow_id','id');
    }
    //节点关联路由
    public function node_route()
    {
        return $this->belongsTo('App\Models\Route','route_id','id');
    }
}
