<?php

class OptionAnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('option_answers')->delete();        
        
        
        OptionAnswer::create(array(
            'id' => 1,
            'plan_id' => 1,
            'question_id' => 12,
            'question_option_id' => 1
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
