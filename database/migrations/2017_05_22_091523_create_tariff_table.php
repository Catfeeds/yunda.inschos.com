<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tariff', function (Blueprint $table) {
            $table->integer('id')->comment('费率ID');
            $table->integer('clause_id')->comment('条款ID');
            $table->integer('tariff')->comment('费率');
            $table->string('age')->default('#')->comment('年纪');
            $table->enum('sex',['男', '女','#'])->comment('性别');
            $table->string('period')->default('#')->comment('缴费期间')->nullable();
            $table->string('by_stages')->default('#')->comment('付款方式')->nullable();
            $table->string('shebao')->default('#')->comment('有无社保')->nullable();
            $table->enum('status', ['on', 'off'])->default('on')->comment('状态');
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
        //
        Schema::dropIfExists('tariff');
    }
}
