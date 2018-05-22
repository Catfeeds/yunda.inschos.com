<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComMessageRule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('message_rule', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主键id,自增');
            $table->integer('receive_id')->index()->comment('接受信息人员id,如果为0,则表示发送给所有用户');
            $table->integer('send_id')->comment('发送人员id,如果为0,则表示管理员发送');
            $table->integer('message_id')->comment('消息id,此id与message中的id对应');
            $table->integer('status')->default(0)->comment('当前信息的阅读状态，0表示未读，1表示已读');
            $table->integer('receive_type')->index()->comment('接受人员的类型，0表示全体人员，1表示全体代理人，2表示全体客户，3表示全体个人客户，4表示全体企业客户');
            $table->integer('read_time')->default(0)->index()->comment('可阅读时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('message_rule');
    }
}
