<?php
/**
 * Created by PhpStorm.
 * User: dell01
 * Date: 2017/4/26
 * Time: 15:36
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MessageRule extends Model{

    //站内信关系表
    protected $table="message_rule";


    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getMessage()
    {
        return $this->hasOne('App\Models\Message',"id","mid");
//        return $this->belongsToMany('App\Models\Message','id','mid');
    }
    public function get_detail()
    {
        return $this->hasOne('App\Models\Message','id','message_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','send_id');
    }
}
