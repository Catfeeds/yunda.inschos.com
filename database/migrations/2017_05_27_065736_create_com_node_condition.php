<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComNodeCondition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_condition', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->integer('node_id')->comment('关联的节点id');
            $table->integer('status_id')->comment('关联的状态id');
            $table->string('return_message')->comment('返回信息')->nullable();
            $table->integer('is_possible')->comment('判断是否可以执行，0表示可以执行，1表示可以执行');
            $table->integer('status')->comment('状态');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('node_condition');
    }
}
