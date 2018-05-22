<?php

use Illuminate\Database\Seeder;

class TableFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  //表和字段插入
        DB::table('table_field')->insert([
            //       表名                字段名             名称                 描述                                 状态
            array('table'=>'claim','field'=>'status','name'=>'理赔状态','describe'=>'这是理赔表状态字段','status'=>0),
        ]);
    }
}
