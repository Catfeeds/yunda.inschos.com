<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id')->comment('主键id,自增');
            $table->string('describe')->comment('备注信息')->nullable();
            $table->string('status_name')->comment('状态的名称');
            $table->integer('field_id')->index()->comment('对应字段的id');
            $table->integer('group_id')->comment('所属状态的id');
            $table->integer('status')->comment('对应的状态');
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
        Schema::dropIfExists('status');
    }
}
