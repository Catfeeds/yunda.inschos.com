<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComUserBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_bank', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('user_id')->default(null)->comment('用户表关联ID');
            $table->string('bank_code')->comment('银行卡号');
            $table->string('bank_name')->comment('银行名称');
            $table->string('bank_phone')->comment('银行预留用户电话');
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
        Schema::dropIfExists('user_bank');
    }
}
