<?php

class QuestionOptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('question_options')->delete();
                      
        QuestionOption::create(array(
            'id' => 1,
            'question_id' => 12,            
            'text' => 'Audioaufnahmen',
            'value' => 'Audioaufnahmen'
        ));
        
        QuestionOption::create(array(
            'id' => 2,            
            'question_id' => 12,
            'text' => 'Beobachtungsdaten',
            'value' => 'Beobachtungsdaten'
        ));
        
        QuestionOption::create(array(
            'id' => 3,            
            'question_id' => 12,            
            'text' => 'Messdaten',
            'value' => 'Messdaten'
        ));
        
        QuestionOption::create(array(
            'id' => 4,             
            'question_id' => 12,            
            'text' => 'Simulationsdaten',
            'value' => 'Simulationsdaten'
        ));
        
        QuestionOption::create(array(
            'id' => 5,             
            'question_id' => 14,            
            'text' => 'DFG-Anforderung',
            'value' => 'DFG-Anforderung'
        ));
        
        QuestionOption::create(array(
            'id' => 6,             
            'question_id' => 14,            
            'text' => 'BMBF-Anforderung',
            'value' => 'BMBF-Anforderung'
        ));
        
        QuestionOption::create(array(
            'id' => 7,             
            'question_id' => 14,            
            'text' => 'Andere',
            'value' => 'Andere'
        ));
        
        QuestionOption::create(array(
            'id' => 8,             
            'question_id' => 16,            
            'text' => 'bis zum Ende des Projekts',
            'value' => 'bis zum Ende des Projekts'
        ));
        
        QuestionOption::create(array(
            'id' => 9,             
            'question_id' => 16,            
            'text' => 'bis 10 Jahre nach Ende des Projekts',
            'value' => 'bis 10 Jahre nach Ende des Projekts',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 10,             
            'question_id' => 16,            
            'text' => 'bis zu einem bestimmten Ereignis',
            'value' => 'bis zu einem bestimmten Ereignis'            
        ));
        
        QuestionOption::create(array(
            'id' => 11,            
            'question_id' => 18,            
            'text' => 'Ja',
            'value' => '1',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 12,            
            'question_id' => 18,            
            'text' => 'Nein',
            'value' => '0'            
        ));
        
        QuestionOption::create(array(
            'id' => 13,            
            'question_id' => 19,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 14,            
            'question_id' => 19,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 15,            
            'question_id' => 21,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 16,            
            'question_id' => 21,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 17,            
            'question_id' => 23,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 18,            
            'question_id' => 23,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 19,            
            'question_id' => 26,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 20,            
            'question_id' => 26,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 21,            
            'question_id' => 28,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 22,            
            'question_id' => 28,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 23,            
            'question_id' => 30,            
            'text' => 'extern',
            'value' => 'extern'
        ));
        
        QuestionOption::create(array(
            'id' => 24,            
            'question_id' => 30,            
            'text' => 'TU-intern (TU-Mitglieder)',
            'value' => 'TU-intern (TU-Mitglieder)'
        ));
        
        QuestionOption::create(array(
            'id' => 25,            
            'question_id' => 30,            
            'text' => 'freigegeben für jedermann',
            'value' => 'freigegeben für jedermann',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 26,            
            'question_id' => 31,            
            'text' => 'freigegeben für TU-Mitglieder',
            'value' => 'freigegeben für TU-Mitglieder',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 27,            
            'question_id' => 31,            
            'text' => 'zugänglich nur mit Genehmigung der Projektleitung',
            'value' => 'zugänglich nur mit Genehmigung der Projektleitung'            
        ));
        
        QuestionOption::create(array(
            'id' => 28,            
            'question_id' => 32,            
            'text' => 'Ja',
            'value' => '1',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 29,            
            'question_id' => 32,            
            'text' => 'Nein',
            'value' => '0'            
        ));
        
        QuestionOption::create(array(
            'id' => 30,            
            'question_id' => 34,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 31,            
            'question_id' => 34,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 32,            
            'question_id' => 36,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 33,            
            'question_id' => 36,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 34,            
            'question_id' => 38,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 35,            
            'question_id' => 38,            
            'text' => 'Nein',
            'value' => '0',
            'default' => true
        ));
        
        QuestionOption::create(array(
            'id' => 36,            
            'question_id' => 42,            
            'text' => 'Ja',
            'value' => '1'            
        ));
        
        QuestionOption::create(array(
            'id' => 37,            
            'question_id' => 42,            
            'text' => 'Nein',
            'value' => '0'            
        ));
        
        QuestionOption::create(array(
            'id' => 38,            
            'question_id' => 44,            
            'text' => 'Personalkosten',
            'value' => 'Personalkosten'            
        ));
        
        QuestionOption::create(array(
            'id' => 39,            
            'question_id' => 44,            
            'text' => 'Sachkosten',
            'value' => 'Sachkosten'      
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