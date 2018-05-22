<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status')->insert([
            array('describe'=>'理赔正在内部审核','status_name'=>'理赔待审核','status'=>'0','field_id'=>1,'group_id'=>1),
            array('describe'=>'理赔内部审核失败','status_name'=>'理赔审核失败','status'=>'0','field_id'=>1,'group_id'=>1),
            array('describe'=>'理赔内部审核成功','status_name'=>'理赔审核成功','status'=>'0','field_id'=>1,'group_id'=>1),
            array('describe'=>'理赔内部审核结束','status_name'=>'理赔审核结束','status'=>'0','field_id'=>1,'group_id'=>1),
        ]);
    }
}
