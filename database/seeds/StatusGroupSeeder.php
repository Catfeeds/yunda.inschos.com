<?php

use Illuminate\Database\Seeder;

class StatusGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_group')->insert([
            array('group_name'=>'理赔状态组','group_describe'=>'理赔的状态详情','status'=>'0'),
        ]);
    }
}
