<?php

class QuestionAnswerRelTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('question_answer_rel')->delete();
                      
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                        
            'question_id' => 1,            
            'text_answer_id' => 1,
            'user_id' => 1
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,        
            'question_id' => 2,            
            'text_answer_id' => 2,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 3,            
            'text_answer_id' => 3,
            'user_id' => 1       
        ));  
        
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 4,            
            'list_answer_id' => 1,
            'user_id' => 1       
        )); 
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 4,            
            'list_answer_id' => 2,
            'user_id' => 1       
        )); 
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 4,            
            'list_answer_id' => 3,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 4,            
            'list_answer_id' => 4,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 5,            
            'text_answer_id' => 5,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 6,            
            'text_answer_id' => 6,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 7,            
            'text_answer_id' => 7,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 8,            
            'range_answer_id' => 1,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 9,            
            'text_answer_id' => 8,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 10,            
            'list_answer_id' => 5,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 10,            
            'list_answer_id' => 6,
            'user_id' => 1       
        ));
        
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 11,            
            'list_answer_id' => 7,
            'user_id' => 1       
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 11,            
            'list_answer_id' => 8,
            'user_id' => 1       
        ));

        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 12,            
            'option_answer_id' => 1,
            'user_id' => 1
        ));
        
        QuestionAnswerRel::create(array(
            'plan_id' => 1,                    
            'question_id' => 13,            
            'range_answer_id' => 2,
            'user_id' => 1       
        ));
    }
}

/*
class QuestionInputsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('question_inputs')->delete();
        
        QuestionInput::create(array(
            'question_id' => 12,
            'input_type_id' => 5,
            'values' => '|||Simulationsdaten|Video-Interviews|Andere'
        ));

        QuestionInput::create(array(
            'question_id' => 12,
            'input_type_id' => 1,
            'prepend' => 'Wenn Andere:'
        ));

        QuestionInput::create(array(
            'question_id' => 13,
            'input_type_id' => 9,
            'prepend' => 'Ca.',
            'append' => 'GB',
            'values' => '0|1000|10'
        ));

        QuestionInput::create(array(
            'question_id' => 14,
            'input_type_id' => 5,
            'values' => 'ASCII-Daten|Bilder|Binärdaten|CAD-Daten|Skripte|Dokumentation|Andere'
        ));
        
        QuestionInput::create(array(
            'question_id' => 14,
            'input_type_id' => 1,
            'prepend' => 'Wenn Andere:'
        ));

        QuestionInput::create(array(
            'question_id' => 15,
            'input_type_id' => 3,
            'values' => 'DFG-Anforderung|BMBF-Anforderung|Andere'
        ));

        QuestionInput::create(array(
            'question_id' => 15,
            'input_type_id' => 2,
            'prepend' => 'Wenn Andere:'
        ));
        
        QuestionInput::create(array(
            'question_id' => 16,
            'input_type_id' => 6,
            'values' => 'bis zum Ende des Projekts|bis 10 Jahre nach Ende des Projekts|bis zu einem bestimmten Ereignis:',
            'default' => 'bis 10 Jahre nach Ende des Projekts'
        ));
        
        QuestionInput::create(array(
            'question_id' => 16,
            'input_type_id' => 1
        ));

        QuestionInput::create(array(
            'question_id' => 17,
            'input_type_id' => 11,
            'default' => 'Ja'
        ));

        QuestionInput::create(array(
            'question_id' => 18,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 18,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, welche:'
        ));
        
        QuestionInput::create(array(
            'question_id' => 19,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 19,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, welchen Auflagen unterliegen die Forschungsergebnisse?'
        ));
        
        QuestionInput::create(array(
            'question_id' => 20,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 20,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, welchen?'
        ));

        QuestionInput::create(array(
            'question_id' => 21,
            'input_type_id' => 2
        ));

        QuestionInput::create(array(
            'question_id' => 22,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 22,
            'input_type_id' => 1,
            'prepend' => 'Wenn ja, welchen?'
        ));

        QuestionInput::create(array(
            'question_id' => 23,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 23,
            'input_type_id' => 7,
            'prepend' => 'Wenn ja, ab wann dürfen auch Andere auf Daten bzw. Metadaten zugreifen (Sperrfristen)?'
        ));
        
        QuestionInput::create(array(
            'question_id' => 24,
            'input_type_id' => 6,
            'values' => 'extern|TU-intern (TU-Mitglieder)',
            'default' => 'extern'
        ));

        QuestionInput::create(array(
            'question_id' => 25,
            'input_type_id' => 6,
            'values' => 'freigegeben für jedermann|freigegeben für TU-Mitglieder|zugänglich nur mit Genehmigung der Projektleitung',
            'default' => 'freigegeben für TU-Mitglieder'
        ));

        QuestionInput::create(array(
            'question_id' => 26,
            'input_type_id' => 11,
            'default' => 'Ja'
        ));

        QuestionInput::create(array(
            'question_id' => 26,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, wo?'
        ));

        QuestionInput::create(array(
            'question_id' => 27,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 27,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, wer besitzt die Rechte?'
        ));
        
        QuestionInput::create(array(
            'question_id' => 28,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 28,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, wie werden sie lizenziert und welche Nutzungsrechte werden eingeräumt?'
        ));
        
        QuestionInput::create(array(
            'question_id' => 29,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));

        QuestionInput::create(array(
            'question_id' => 29,
            'input_type_id' => 2,
            'prepend' => 'Wenn ja, wie soll mit diesen Forschungsergebnissen umgegangen werden?'
        ));

        QuestionInput::create(array(
            'question_id' => 30,
            'input_type_id' => 2
        ));
        
        QuestionInput::create(array(
            'question_id' => 31,
            'input_type_id' => 9,
            'append' => 'Euro',
            'values' => '0|50000|1000'            
        ));

        QuestionInput::create(array(
            'question_id' => 32,
            'input_type_id' => 11,
            'default' => 'Nein'
        ));
        
        QuestionInput::create(array(
            'question_id' => 33,
            'input_type_id' => 9,
            'append' => 'Euro',
            'values' => '0|50000|1000'            
        ));

        QuestionInput::create(array(
            'question_id' => 34,
            'input_type_id' => 5,
            'values' => 'Personalkosten|Sachkosten'
        ));        
        
    }
}


/*
why not like this!?!
SELECT
FROM questions
INNER JOIN question_inputs ON questions.id = question_inputs.question_id
*/