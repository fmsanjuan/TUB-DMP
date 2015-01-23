<?php

class FakeDataSeeder extends Seeder
{
	public function run()
	{
		Eloquent::unguard();
        
        //$this->call('UsersTableSeeder');
        //$this->call('FileFormatsTableSeeder');
        //$this->call('FileTypesTableSeeder');

	}
}
/*
class QuestionsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('questions')->delete();
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Vollständiger Name des Forschungsprojekts',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1a'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '2',
            'order' => 2,            
            'text' => 'Abstract (dt.)',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1b'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Abstract (engl.)',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1b'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '4',
            'order' => 4,
            'text' => 'Schlagwörter',
            //'guidance' => '',
            //'reference' => ''
        ));

        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '5',
            'order' => 5,
            'text' => 'Wer ist der Mittelgeber?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1c'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '6',
            'order' => 6,
            'text' => 'Wer ist der Abrechnungspartner / Projektträger?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1c'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '7',
            'order' => 7,
            'text' => 'Name des Förderprogramms',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1c'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '8',
            'order' => 8,
            'text' => 'Projektbeginn und Projektende',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1d'
        ));

        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '9',
            'order' => 9,
            'text' => 'Welche internen oder externen Projektpartner sind an dem Projekt finanziell beteiligt?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1e'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '10',
            'order' => 10,
            'text' => 'Wer ist der/die verantwortliche Projektleiter/in?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1f'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '11',
            'order' => 11,
            'text' => 'Weitere TU-interne Projektleiter/innen?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.1f'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 2,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Um welche Art von Daten handelt es sich?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.3a'
        ));

        Question::create(array(
            'template_id' => 1,
            'section_id' => 2,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Wie groß ist die geschätzte Datenmenge?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.3d'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 2,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'In welchen Dateiformaten werden die Daten vorliegen? Mit welchen Datenformaten wird gearbeitet?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.3f'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 3,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Gründe für die Aufbewahrung',
            'guidance' => 'z.B. Anforderungen des Mittelgebers',
            'reference' => 'WissGrid: 2.1'
        ));

        Question::create(array(
            'template_id' => 1,
            'section_id' => 3,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Wie lange sollen die Daten aufbewahrt werden?',
            //'guidance' => '',
            'reference' => 'WissGrid: 2.3a'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 4,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Können prinzipiell die Daten auch von Anderen innerhalb oder außerhalb des Projekts genutzt werden?',
            //'guidance' => '',
            'reference' => 'WissGrid: 6.1a'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 4,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Gibt es Gründe, die Daten prinzipiell nicht zu freizugeben?',
            'guidance' => 'z.B. Datenschutz, Geheimhaltung etc.',
            'reference' => 'WissGrid: 6.1b'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Unterliegen die Forschungsdaten dem Datenschutz?',
            'guidance' => 'Handelt es sich bei den Forschungsdaten um „personenbezogene Daten“ im Sinne des Bundesdatenschutzgesetzes (BDSG §3) ?',
            'reference' => 'WissGrid: 9.1a'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Unterliegen die Forschungsdaten sonstigen Datenschutzauflagen?'
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Welche Maßnahmen werden zum Schutz dieser Daten getroffen?',
            'reference' => 'WissGrid: 9.1d'            
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '4',
            'order' => 4,
            'text' => 'Unterliegen die Daten sonstigen Nutzungseinschränkungen oder Lizenzbedingungen?',
            'reference' => 'WissGrid: 6.1b'            
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '5',
            'order' => 5,
            'text' => 'Gibt es ein Recht auf Erstnutzung durch den Ersteller der Daten?',
            'reference' => 'WissGrid: 6.2a'            
        ));
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '6',
            'order' => 6,
            'text' => 'Sollen die Metadaten suchbar sein?',
            'reference' => 'WissGrid: 6.1f'            
        ));

        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '7',
            'order' => 7,
            'text' => 'Wie soll der Zugriff auf die Forschungsergebnisse (Forschungsdaten, Volltexte) erfolgen?',
            'reference' => 'WissGrid: 6.1e'            
        ));        
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '8',
            'order' => 8,
            'text' => 'Sollen die Forschungsergebnisse auch außerhalb der TU Berlin nachgewiesen werden?',
            'guidance' => 'z.B. in Google Scholar, in anderen Fachrepositorien',
            'reference' => 'WissGrid: 6.1g'
        ));        

        Question::create(array(
            'template_id' => 1,
            'section_id' => 6,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Werden fremde Forschungsdaten oder Softwarekomponenten verwendet, die dem Urheberrecht, dem Patentrecht oder anderen geistigen Eigentumsrechten unterliegen?',
            'guidance' => 'z.B. Programmbibliotheken, Algorithmen aus anderen Projekten',
            'reference' => 'WissGrid: 9.2a'
        ));        
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 6,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Unterliegen eigene Forschungsergebnisse oder Softwarekomponenten dem Urheberrecht, dem Patentrecht oder anderen geistigen Eigentumsrechten?',
            'reference' => 'WissGrid: 9.2b'
        ));          
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 6,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Existieren Schutzfristen für die Forschungsergebnisse, die während des Aufbewahrungszeitraumes enden?',
            'reference' => 'WissGrid: 9.2d'
        ));          
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Wer übernimmt auf Dauer die Kosten für das Forschungsdaten-Management (langfristige Aufbewahrung der Forschungsergebnisse)?',
            'reference' => 'WissGrid: 8.1c'
        ));          

        Question::create(array(
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Wie hoch ist das im Projekt veranschlagte Budget für das Forschungsdaten-Management?',
            'reference' => 'WissGrid: 8.1c'
        ));

        Question::create(array(
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Wurden beim Mittelgeber Mittel für das Forschungsdaten-Management beantragt bzw. wurden diese bewilligt?'
        ));          
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '4',
            'order' => 4,
            'text' => 'In welcher Höhe wurden Mittel beantragt bzw. bewilligt?'            
        ));          
        
        Question::create(array(
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '5',
            'order' => 5,
            'text' => 'Wofür wurden diese Mittel beantragt bzw. bewilligt?'            
        ));        
    }
}
*/

/*
class QuestionInputsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('question_inputs')->delete();
        
        QuestionInput::create(array(
            'question_id' => 1,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'
        ));

        QuestionInput::create(array(
            'question_id' => 2,
            'input_type_id' => 2,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'
        ));
                
        QuestionInput::create(array(
            'question_id' => 3,
            'input_type_id' => 2,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'
        ));
        
        QuestionInput::create(array(
            'question_id' => 4,
            'input_type_id' => 4
        ));

        QuestionInput::create(array(
            'question_id' => 5,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));

        QuestionInput::create(array(
            'question_id' => 6,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));

        QuestionInput::create(array(
            'question_id' => 7,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));
        
        QuestionInput::create(array(
            'question_id' => 8,
            'input_type_id' => 8,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));

        QuestionInput::create(array(
            'question_id' => 9,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));

        QuestionInput::create(array(
            'question_id' => 10,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));

        QuestionInput::create(array(
            'question_id' => 11,
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus ePa (Abt. V C) - in Planung -'            
        ));

        QuestionInput::create(array(
            'question_id' => 12,
            'input_type_id' => 5,
            'values' => 'Audioaufnahmen|Beobachtungsdaten|Messdaten|Simulationsdaten|Video-Interviews|Andere'
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
*/



/*
why not like this!?!
SELECT
FROM questions
INNER JOIN question_inputs ON questions.id = question_inputs.question_id
*/

class Question2InputTableSeeder extends Seeder {
    public function run()
    {
        DB::table('question2input')->delete();
        
        Question2Input::create(array(
            'question_id' => 1,
            'question_input_id' => 1            
        ));
        
        Question2Input::create(array(
            'question_id' => 2,
            'question_input_id' => 2            
        ));
        
        Question2Input::create(array(
            'question_id' => 3,
            'question_input_id' => 3            
        ));

        Question2Input::create(array(
            'question_id' => 4,
            'question_input_id' => 4            
        ));
        
        Question2Input::create(array(
            'question_id' => 5,
            'question_input_id' => 5            
        ));

        Question2Input::create(array(
            'question_id' => 6,
            'question_input_id' => 6            
        ));
        
        Question2Input::create(array(
            'question_id' => 7,
            'question_input_id' => 7            
        ));

        Question2Input::create(array(
            'question_id' => 8,
            'question_input_id' => 8            
        ));
        
        Question2Input::create(array(
            'question_id' => 9,
            'question_input_id' => 9            
        ));

        Question2Input::create(array(
            'question_id' => 10,
            'question_input_id' => 10            
        ));

        Question2Input::create(array(
            'question_id' => 11,
            'question_input_id' => 11            
        ));
        
        Question2Input::create(array(
            'question_id' => 12,
            'question_input_id' => 12            
        ));

        Question2Input::create(array(
            'question_id' => 12,
            'question_input_id' => 13            
        ));

        Question2Input::create(array(
            'question_id' => 13,
            'question_input_id' => 14            
        ));
        
        Question2Input::create(array(
            'question_id' => 14,
            'question_input_id' => 15            
        ));
        
        Question2Input::create(array(
            'question_id' => 14,
            'question_input_id' => 16            
        ));

        Question2Input::create(array(
            'question_id' => 15,
            'question_input_id' => 17            
        ));
        
        Question2Input::create(array(
            'question_id' => 15,
            'question_input_id' => 18            
        ));

        Question2Input::create(array(
            'question_id' => 16,
            'question_input_id' => 19            
        ));

        Question2Input::create(array(
            'question_id' => 16,
            'question_input_id' => 20            
        ));
        
        Question2Input::create(array(
            'question_id' => 17,
            'question_input_id' => 21            
        ));

        Question2Input::create(array(
            'question_id' => 18,
            'question_input_id' => 22            
        ));
        
        Question2Input::create(array(
            'question_id' => 18,
            'question_input_id' => 23            
        ));
        
        Question2Input::create(array(
            'question_id' => 19,
            'question_input_id' => 24            
        ));
        
        Question2Input::create(array(
            'question_id' => 19,
            'question_input_id' => 25            
        ));

        Question2Input::create(array(
            'question_id' => 20,
            'question_input_id' => 26            
        ));
        
        Question2Input::create(array(
            'question_id' => 20,
            'question_input_id' => 27            
        ));
        
        Question2Input::create(array(
            'question_id' => 21,
            'question_input_id' => 28            
        ));
        
        Question2Input::create(array(
            'question_id' => 22,
            'question_input_id' => 29            
        ));
        
        Question2Input::create(array(
            'question_id' => 22,
            'question_input_id' => 30            
        ));
        
        Question2Input::create(array(
            'question_id' => 23,
            'question_input_id' => 31            
        ));

        Question2Input::create(array(
            'question_id' => 23,
            'question_input_id' => 32            
        ));
        
        Question2Input::create(array(
            'question_id' => 24,
            'question_input_id' => 33            
        ));

        Question2Input::create(array(
            'question_id' => 25,
            'question_input_id' => 34            
        ));

        Question2Input::create(array(
            'question_id' => 26,
            'question_input_id' => 35            
        ));

        Question2Input::create(array(
            'question_id' => 26,
            'question_input_id' => 36            
        ));
        
        Question2Input::create(array(
            'question_id' => 27,
            'question_input_id' => 37            
        ));
        
        Question2Input::create(array(
            'question_id' => 27,
            'question_input_id' => 38            
        ));
        
        Question2Input::create(array(
            'question_id' => 28,
            'question_input_id' => 39            
        ));
        
        Question2Input::create(array(
            'question_id' => 28,
            'question_input_id' => 40            
        ));

        Question2Input::create(array(
            'question_id' => 29,
            'question_input_id' => 41            
        ));

        Question2Input::create(array(
            'question_id' => 29,
            'question_input_id' => 42            
        ));

        Question2Input::create(array(
            'question_id' => 30,
            'question_input_id' => 43            
        ));
        
        Question2Input::create(array(
            'question_id' => 31,
            'question_input_id' => 44            
        ));

        Question2Input::create(array(
            'question_id' => 32,
            'question_input_id' => 45            
        ));

        Question2Input::create(array(
            'question_id' => 33,
            'question_input_id' => 46            
        ));
        
        Question2Input::create(array(
            'question_id' => 34,
            'question_input_id' => 47            
        ));
        
        
        
        
    }
    
}