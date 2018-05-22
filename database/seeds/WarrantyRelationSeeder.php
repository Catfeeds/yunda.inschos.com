<?php

use Illuminate\Database\Seeder;

class WarrantyRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('warranty_relation')->insert([
            array('abbreviation'=>'f','relation_name'=>'父亲'),
            array('abbreviation'=>'m','relation_name'=>'母亲'),
            array('abbreviation'=>'s','relation_name'=>'儿子'),
            array('abbreviation'=>'d','relation_name'=>'女儿'),
            array('abbreviation'=>'w','relation_name'=>'妻子'),
            array('abbreviation'=>'h','relation_name'=>'丈夫'),
            array('abbreviation'=>'self','relation_name'=>'本人'),
            array('abbreviation'=>'staff','relation_name'=>'员工'),
        ]);
    }
}
