<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specials', function (Blueprint $table) {
            $table->increments('id')->comment('主键id,自增');
            $table->string('special_num',100)->comment('工单号');
            $table->integer('status')->default('0')->comment('状态,0未处理，1处理');
            $table->integer('delete_id')->default('0')->comment('删除，0未删除，1删除');
            $table->string('company',100)->comment('公司');
            $table->string('title',100)->comment('标题');
            $table->longText('content')->comment('内容');
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
        Schema::dropIfExists('specials');
    }
}
