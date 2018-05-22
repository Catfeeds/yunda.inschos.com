<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComNode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->integer('flow_id')->comment('所属工作流的id');
            $table->integer('route_id')->comment('对应的路由，即对应的方法，id');
            $table->string('node_name')->comment('节点的名称');
            $table->string('describe')->comment('节点的描述');
            $table->integer('status')->comment('节点的状态');
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
        Schema::dropIfExists('node');
    }
}
