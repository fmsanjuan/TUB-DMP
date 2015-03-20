<?php

class PlansTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('plans')->delete();
        
        Plan::create(array(
            'name' => 'Testplan I',
            'project_number' => '63914396',
            'template_id' => 1,
            'user_id' => 1,
            'active' => 1
        ));
    }
}