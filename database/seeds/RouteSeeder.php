<?php

use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  //表和字段插入
        DB::table('route')->insert([
                    //方法名称
            array('route_name'=>'发起理赔','path1'=>'claim','path2'=>'claim','path3'=>'','status'=>0),
        ]);
    }
}
