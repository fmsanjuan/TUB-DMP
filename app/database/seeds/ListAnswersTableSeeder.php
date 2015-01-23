<?php

class ListAnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('list_answers')->delete();        
        
        ListAnswer::create(array(
            'id' => 1,
            'plan_id' => 1,
            'question_id' => 4,
            'text' => 'Heat'            
        ));
        
        ListAnswer::create(array(
            'id' => 2,
            'plan_id' => 1,
            'question_id' => 4,
            'text' => 'Waves'            
        ));
        
        ListAnswer::create(array(
            'id' => 3,
            'plan_id' => 1,
            'question_id' => 4,
            'text' => 'Mercury'            
        ));
        
        ListAnswer::create(array(
            'id' => 4,
            'plan_id' => 1,
            'question_id' => 4,
            'text' => 'Puzzle'            
        ));
        
        ListAnswer::create(array(
            'id' => 5,            
            'plan_id' => 1,
            'question_id' => 10,
            'text' => 'John Doe'
        ));
        
        ListAnswer::create(array(
            'id' => 6,            
            'plan_id' => 1,
            'question_id' => 10,
            'text' => 'Johnny Appleseed'
        ));        
        
        ListAnswer::create(array(
            'id' => 7,            
            'plan_id' => 1,
            'question_id' => 11,
            'text' => 'Mario Rossi'
        ));
        
        ListAnswer::create(array(
            'id' => 8,            
            'plan_id' => 1,
            'question_id' => 11,
            'text' => 'Piero Pers'
        ));
        
        
    }
}
