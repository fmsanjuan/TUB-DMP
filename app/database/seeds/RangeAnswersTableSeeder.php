<?php

class RangeAnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('range_answers')->delete();        
        
        RangeAnswer::create(array(
            'id' => 1,
            'plan_id' => 1,
            'question_id' => 8,
            'alpha' => '01.02.2013',
            'omega' => '31.10.2018'
        ));
        
        RangeAnswer::create(array(
            'id' => 2,
            'plan_id' => 1,
            'question_id' => 13,
            'alpha' => '5',
            'omega' => '25'
        ));
        
        /*
        OptionAnswer::create(array(
            'plan_id' => 1,
            'question_id' => 12,
            'question_option_id' => 3
        ));
        
        OptionAnswer::create(array(
            'plan_id' => 1,
            'question_id' => 12,
            'question_option_id' => 4
        ));
        */
    }
}
