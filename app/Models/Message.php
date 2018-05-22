<?php
/**
 * Created by PhpStorm.
 * User: dell01
 * Date: 2017/4/26
 * Time: 15:36
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Message extends Model{

    //站内信内容表
    protected $table="message";


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function message_rule()
    {
        return $this->hasMany('App\Models\MessageRule','message_id','id');
    }
}
