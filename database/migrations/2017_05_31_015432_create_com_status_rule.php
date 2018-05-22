<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComStatusRule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_rule', function (Blueprint $table) {
            $table->increments('id')->comment('主键id,自增');
            $table->integer('parent_id')->comment('上一级状态id');
            $table->integer('status_id')->comment('状态id');
            $table->integer('status')->comment('状态id');
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
        Schema::dropIfExists('status_rule');
    }
}
