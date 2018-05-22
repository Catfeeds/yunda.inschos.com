<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComStatusGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_group', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('group_name')->comment('分组名称');
            $table->string('group_describe')->comment('分组描述');
            $table->integer('status')->comment('分组当前状态');
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
        Schema::dropIfExists('status_group');
    }
}
