<?php

class TextAnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('text_answers')->delete();
        
        TextAnswer::create(array(
            'id' => 1,
            'plan_id' => 1,
            'question_id' => 1,
            'text' => 'Example Title'
        ));
        
        TextAnswer::create(array(
            'id' => 2,            
            'plan_id' => 1,
            'question_id' => 2,
            'text' => 'Abstract in German: Lorem Ipsum ...'
        ));
        
        TextAnswer::create(array(
            'id' => 3,            
            'plan_id' => 1,
            'question_id' => 3,
            'text' => 'Abstract in English: Lorem Ipsum ...'
        ));
        
        TextAnswer::create(array(
            'id' => 5,            
            'plan_id' => 1,
            'question_id' => 4,
            'text' => 'ACME'
        ));
        
        TextAnswer::create(array(
            'id' => 6,            
            'plan_id' => 1,
            'question_id' => 5,
            'text' => 'ACME'
        ));
        
        TextAnswer::create(array(
            'id' => 7,            
            'plan_id' => 1,
            'question_id' => 6,
            'text' => 'Foo Camp 2014'
        ));
        
        TextAnswer::create(array(
            'id' => 8,            
            'plan_id' => 1,
            'question_id' => 7,
            'text' => 'ACME'
        ));
    }
}