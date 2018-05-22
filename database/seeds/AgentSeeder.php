<?php

use Illuminate\Database\Seeder;


class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            array('user_id'=>'1','pending_status'=>'1', 'certification_status' => 1, 'work_status' => 1),
        ]);
        //todo send ditch
        DB::table('ditches')->insert([
            array('name'=>'渠道一','display_name'=>'渠道', 'type'=>'external_group'),
        ]);
        DB::table('ditch_agent')->insert([
            array('agent_id'=>'1','ditch_id'=>'1'),
        ]);
    }
}
