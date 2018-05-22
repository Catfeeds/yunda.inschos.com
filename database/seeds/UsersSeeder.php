<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
                'name'=>'客户呢称',
                'real_name'=>'真实姓名',
                'email'=>'1@1.com',
                'phone'=>'18611111111',
                'address'=>'北京市东城区夕照寺中街14号',
                'type'=>'user',
                'code'=>'110101199901011953',
                'password'=>bcrypt('123qwe'),
        ]);
    }
}
