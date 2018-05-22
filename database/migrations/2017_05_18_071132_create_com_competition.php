<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComCompetition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('competition', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主键id,自增');
            $table->string('name')->comment('竞赛方案的名称');
            $table->date('start_time')->comment('开始时间');
            $table->date('end_time')->comment('结束时间');
            $table->integer('condition_type')->comment('条件类型,1表示金额满足条件，2表示数量满足条件，3表示金额和数量都满足，4表示两者满足一个就行');
            $table->integer('product_id')->comment('产品id')->nullable();
            $table->string('private_p_code')->comment('产品内部唯一码')->nullable();
            $table->integer('status')->comment('竞赛方案的状态');
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
        Schema::dropIfExists('competition');
    }
}
