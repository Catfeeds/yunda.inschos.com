<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComCompetitionCondition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('competition_condition', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主键id,自增');
            $table->integer('competition_id')->comment('竞赛方案id');
            $table->integer('min_count')->comment('最小数量');
            $table->integer('max_count')->comment('最大数量');
            $table->string('min_sum')->comment('最小金额');
            $table->string('max_sum')->comment('最大金额');
            $table->integer('rate')->comment('佣金比率');
            $table->integer('reward')->comment('固定金额奖励');
            $table->integer('award_type')->comment('奖励的方式,1表示比率奖励，2表示固定金额奖励，3表示两者都有');
            $table->integer('status')->comment('状态');
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
        Schema::dropIfExists('competition_condition');
    }
}
