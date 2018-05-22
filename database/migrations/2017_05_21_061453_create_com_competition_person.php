<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComCompetitionPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('competition_person', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主键id,自增');
            $table->integer('competition_id')->comment('竞赛方案id');
            $table->integer('agent_id')->comment('可用的代理人id,如果为0则代表对所有代理人都有效');
            $table->integer('ditch_id')->comment('渠道id,如果为0则表示所有的渠道都有效');
            $table->integer('all_agent')->comment('用来判断是否是对所有代理人有效，0表示所有代理人有效，大于0则不是');
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
        Schema::dropIfExists('competition_person');
    }
}