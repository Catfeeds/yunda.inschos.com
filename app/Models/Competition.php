<?php
/**
 * Created by PhpStorm.
 * User: dell01
 * Date: 2017/4/26
 * Time: 15:36
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Competition extends Model{
    protected $table="competition";


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function competition_condition()
    {
        return $this->hasMany('App\Models\CompetitionCondition','competition_id','id');
    }

    //竞赛方案关联产品
    public function competition_product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}

