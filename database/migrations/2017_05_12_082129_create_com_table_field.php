<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComTableField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('table_field', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主键id,自增');
            $table->string('table')->index()->comment('表名');
            $table->string('field')->index()->comment('字段名');
            $table->string('name')->comment('表和字段名称');
            $table->string('describe')->comment('描述')->nullable();
            $table->integer('status')->comment('状态名');
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
        Schema::dropIfExists('table_field');
    }
}
