<?php

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->delete();
        
        Question::create(array(
            'id' => 1,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '1',
            'order' => 1,            
            'text' => 'Vollständiger Name des Forschungsprojekts',
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1a',
            
        ));
        
        Question::create(array(
            'id' => 2,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '2a',
            'order' => 2,            
            'text' => 'Abstract (dt.)',
            'input_type_id' => 2,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1b'
        ));
        
        Question::create(array(
            'id' => 3,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '2b',
            'order' => 3,
            'text' => 'Abstract (engl.)',
            'input_type_id' => 2,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1b'
        ));
        
        Question::create(array(
            'id' => 4,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '3',
            'order' => 4,
            'text' => 'Schlagwörter',
            'input_type_id' => 5,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
        ));

        Question::create(array(
            'id' => 5,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '4',
            'order' => 5,
            'text' => 'Wer ist der Mittelgeber?',
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1c'
        ));
        
        Question::create(array(
            'id' => 6,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '5',
            'order' => 6,
            'text' => 'Wer ist der Abrechnungspartner / Projektträger?',
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1c'
        ));
        
        Question::create(array(
            'id' => 7,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '6',
            'order' => 7,
            'text' => 'Name des Förderprogramms',
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1c'
        ));
        
        Question::create(array(
            'id' => 8,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '7',
            'order' => 8,
            'text' => 'Projektbeginn und Projektende',
            'input_type_id' => 9,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1d'
        ));

        Question::create(array(
            'id' => 9,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '8',
            'order' => 9,
            'text' => 'Welche internen oder externen Projektpartner sind an dem Projekt finanziell beteiligt?',
            'input_type_id' => 1,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1e'
        ));
        
        Question::create(array(
            'id' => 10,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '9',
            'order' => 10,
            'text' => 'Wer ist der/die verantwortliche Projektleiter/in?',
            'input_type_id' => 5,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1f'
        ));
        
        Question::create(array(
            'id' => 11,
            'template_id' => 1,
            'section_id' => 1,
            'keynumber' => '10',
            'order' => 11,
            'text' => 'Weitere TU-interne Projektleiter/innen?',
            'input_type_id' => 5,
            'comment' => 'Quelle: Automatische Übernahme aus IVMC (Abt. V C) - in Planung -',
            'reference' => 'WissGrid: 1.1f'
        ));
        
        Question::create(array(
            'id' => 12,
            'template_id' => 1,
            'section_id' => 2,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Um welche Art von Daten handelt es sich?',
            'input_type_id' => 6,
            'comment' => 'Quelle: Ihre Angaben zu Datenmengen',
            'reference' => 'WissGrid: 1.3a'
        ));

        Question::create(array(
            'id' => 13,
            'template_id' => 1,
            'section_id' => 2,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Wie groß ist die geschätzte Datenmenge?',
            'input_type_id' => 11,
            'prepend' => 'Ca.',
            'append' => 'GB',
            'comment' => 'Quelle: Ihre Angaben zu Datenmengen',
            'reference' => 'WissGrid: 1.3d',
            'value' => '0|100|1'
        ));
        
        
        Question::create(array(
            'id' => 14,
            'template_id' => 1,
            'section_id' => 3,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Gründe für die Aufbewahrung',
            'input_type_id' => 3,
            'comment' => 'z.B. Anforderungen des Mittelgebers',
            'reference' => 'WissGrid: 2.1'
        ));
        
        Question::create(array(
            'id' => 15,
            'template_id' => 1,
            'section_id' => 3,
            'parent_question_id' => 14,
            'text' => 'Andere:',
            'input_type_id' => 2           
        ));
        
        Question::create(array(
            'id' => 16,
            'template_id' => 1,
            'section_id' => 3,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Wie lange sollen die Daten aufbewahrt werden?',
            'input_type_id' => 7
        ));
        
        Question::create(array(
            'id' => 17,
            'template_id' => 1,
            'section_id' => 3,
            'parent_question_id' => 16,
            'text' => 'Wenn anderer Zeitpunkt, welcher?',
            'input_type_id' => 1
        ));
        
        Question::create(array(
            'id' => 18,
            'template_id' => 1,
            'section_id' => 4,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Können prinzipiell die Daten auch von Anderen innerhalb oder außerhalb des Projekts genutzt werden?',            
            'input_type_id' => 12,
            'reference' => 'WissGrid: 6.1a'
        ));
        
        Question::create(array(
            'id' => 19,
            'template_id' => 1,
            'section_id' => 4,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Gibt es Gründe, die Daten prinzipiell nicht zu freizugeben?',
            'input_type_id' => 12,
            'guidance' => 'z.B. Datenschutz, Geheimhaltung etc.',
            'reference' => 'WissGrid: 6.1b'
        ));
        
        Question::create(array(
            'id' => 20,
            'template_id' => 1,
            'section_id' => 4,
            'parent_question_id' => 19,
            'text' => 'Wenn ja, welche?',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 21,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Unterliegen die Forschungsdaten dem Datenschutz?',
            'input_type_id' => 12,
            'guidance' => 'Handelt es sich bei den Forschungsdaten um „personenbezogene Daten“ im Sinne des Bundesdatenschutzgesetzes (BDSG §3) ?',
            'reference' => 'WissGrid: 9.1a'            
        ));
        
        Question::create(array(
            'id' => 22,
            'template_id' => 1,
            'section_id' => 5,
            'parent_question_id' => 21,
            'text' => 'Wenn ja, welchen Auflagen unterliegen die Forschungsergebnisse?',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 23,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Unterliegen die Forschungsdaten sonstigen Datenschutzauflagen?',
            'input_type_id' => 12            
        ));
        
        Question::create(array(
            'id' => 24,
            'template_id' => 1,
            'section_id' => 5,
            'parent_question_id' => 23,
            'text' => 'Wenn ja, welchen?',
            'input_type_id' => 2            
        ));        
        
        Question::create(array(
            'id' => 25,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Welche Maßnahmen werden zum Schutz dieser Daten getroffen?',
            'input_type_id' => 2,
            'reference' => 'WissGrid: 9.1d'            
        ));
        
        Question::create(array(
            'id' => 26,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '4',
            'order' => 4,
            'text' => 'Unterliegen die Daten sonstigen Nutzungseinschränkungen oder Lizenzbedingungen?',
            'input_type_id' => 12,
            'reference' => 'WissGrid: 6.1b'            
        ));
        
        Question::create(array(
            'id' => 27,
            'template_id' => 1,
            'section_id' => 5,
            'parent_question_id' => 26,
            'text' => 'Wenn ja, welchen?',
            'input_type_id' => 2           
        ));        
  
        Question::create(array(
            'id' => 28,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '5',
            'order' => 5,
            'text' => 'Gibt es ein Recht auf Erstnutzung durch den Ersteller der Daten?',
            'input_type_id' => 12,
            'reference' => 'WissGrid: 6.2a'
        ));
        
        Question::create(array(
            'id' => 29,
            'template_id' => 1,
            'section_id' => 5,
            'parent_question_id' => 28,
            'text' => 'Wenn ja, ab wann dürfen auch Andere auf Daten bzw. Metadaten zugreifen (Sperrfristen)?',
            'input_type_id' => 8            
        ));
        
        Question::create(array(
            'id' => 30,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '6',
            'order' => 6,
            'text' => 'Sollen die Metadaten suchbar sein?',
            'input_type_id' => 7,
            'reference' => 'WissGrid: 6.1f'
        ));
        
        Question::create(array(
            'id' => 31,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '7',
            'order' => 7,
            'text' => 'Wie soll der Zugriff auf die Forschungsergebnisse (Forschungsdaten, Volltexte) erfolgen?',
            'input_type_id' => 7,
            'reference' => 'WissGrid: 6.1e'            
        )); 
        
        Question::create(array(
            'id' => 32,
            'template_id' => 1,
            'section_id' => 5,
            'keynumber' => '8',
            'order' => 8,
            'text' => 'Sollen die Forschungsergebnisse auch außerhalb der TU Berlin nachgewiesen werden?',
            'input_type_id' => 12,
            'guidance' => 'z.B. in Google Scholar, in anderen Fachrepositorien',
            'reference' => 'WissGrid: 6.1g'
        ));
        
        Question::create(array(
            'id' => 33,
            'template_id' => 1,
            'section_id' => 5,
            'parent_question_id' => 32,
            'text' => 'Wenn ja, wo?',
            'input_type_id' => 2            
        ));     
        
        Question::create(array(
            'id' => 34,
            'template_id' => 1,
            'section_id' => 6,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Werden fremde Forschungsdaten oder Softwarekomponenten verwendet, die dem Urheberrecht, dem Patentrecht oder anderen geistigen Eigentumsrechten unterliegen?',
            'input_type_id' => 12,
            'guidance' => 'z.B. Programmbibliotheken, Algorithmen aus anderen Projekten',
            'reference' => 'WissGrid: 9.2a'
        ));
        
        Question::create(array(
            'id' => 35,
            'template_id' => 1,
            'section_id' => 6,
            'parent_question_id' => 34,
            'text' => 'Wenn ja, wer besitzt die Rechte?',
            'input_type_id' => 2            
        ));  
        
        Question::create(array(
            'id' => 36,
            'template_id' => 1,
            'section_id' => 6,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Unterliegen eigene Forschungsergebnisse oder Softwarekomponenten dem Urheberrecht, dem Patentrecht oder anderen geistigen Eigentumsrechten?',
            'input_type_id' => 12,
            'reference' => 'WissGrid: 9.2b'
        ));          
        
        Question::create(array(
            'id' => 37,
            'template_id' => 1,
            'section_id' => 6,
            'parent_question_id' => 36,
            'text' => 'Wenn ja, wie werden sie lizenziert und welche Nutzungsrechte werden eingeräumt?',
            'input_type_id' => 2
        ));        
        
        
        Question::create(array(
            'id' => 38,
            'template_id' => 1,
            'section_id' => 6,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Existieren Schutzfristen für die Forschungsergebnisse, die während des Aufbewahrungszeitraumes enden?',
            'input_type_id' => 12,
            'reference' => 'WissGrid: 9.2d'
        )); 
        
        Question::create(array(
            'id' => 39,
            'template_id' => 1,
            'section_id' => 6,
            'parent_question_id' => 38,
            'text' => 'Wenn ja, wie soll mit diesen Forschungsergebnissen umgegangen werden?',
            'input_type_id' => 2
        )); 

        Question::create(array(
            'id' => 40,
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'Wer übernimmt auf Dauer die Kosten für das Forschungsdaten-Management (langfristige Aufbewahrung der Forschungsergebnisse)?',
            'input_type_id' => 2,
            'reference' => 'WissGrid: 8.1c'
        ));         
        
        Question::create(array(
            'id' => 41,
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Wie hoch ist das im Projekt veranschlagte Budget für das Forschungsdaten-Management?',
            'input_type_id' => 10,
            'value' => '0|25000|500',
            'reference' => 'WissGrid: 8.1c',
            'prepend' => 'Ca.',
            'append' => '&euro;'
        ));

        Question::create(array(
            'id' => 42,
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Wurden beim Mittelgeber Mittel für das Forschungsdaten-Management beantragt bzw. wurden diese bewilligt?',
            'input_type_id' => 12
        ));          
        
        Question::create(array(
            'id' => 43,
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '4',
            'order' => 4,
            'text' => 'In welcher Höhe wurden Mittel beantragt bzw. bewilligt?',            
            'input_type_id' => 10,
            'value' => '0|25000|500',
            'prepend' => 'Ca.',
            'append' => '&euro;'
        ));          
        
        Question::create(array(
            'id' => 44,
            'template_id' => 1,
            'section_id' => 7,
            'keynumber' => '5',
            'order' => 5,
            'text' => 'Wofür wurden diese Mittel beantragt bzw. bewilligt?',
            'input_type_id' => 6
        )); 
        
        
        
        
        
        
        
        
        Question::create(array(
            'id' => 101,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'ID',
            'guidance' => 'A pertinent ID as determined by the funder and/or institution',
            'input_type_id' => 1
        ));
        
        Question::create(array(
            'id' => 102,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'Funder',
            'guidance' => 'State research funder if relevant',
            'input_type_id' => 1
        )); 
        
        Question::create(array(
            'id' => 103,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'Grant Reference Number',
            'guidance' => 'Enter grant reference number if applicable [POST-AWARD DMPs ONLY]',
            'input_type_id' => 1
        ));
        
        Question::create(array(
            'id' => 104,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '4',
            'order' => 4,
            'text' => 'Project Name',
            'guidance' => 'If applying for funding, state the name exactly as in the grant proposal',
            'input_type_id' => 1
        ));
        
        Question::create(array(
            'id' => 105,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '5',
            'order' => 5,
            'text' => 'Project Description',
            'guidance' => 'Questions to consider: What is the nature of your research project? What research questions are you addressing? For what purpose are the data being collected or created? Briefly summarise the type of study (or studies) to help others understand the purposes for which the data are being collected or created.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 106,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '6',
            'order' => 6,
            'text' => 'PI / Researcher',
            'guidance' => 'Name of Principal Investigator(s) or main researcher(s) on the project',
            'input_type_id' => 5
        ));
        
        Question::create(array(
            'id' => 107,
            'template_id' => 3,
            'section_id' => 11,
            'parent_question_id' => 106,
            'text' => 'PI / Researcher ID',
            'guidance' => 'E.g ORCID',
            'input_type_id' => 1
        ));
        
        Question::create(array(
            'id' => 108,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '7',
            'order' => 7,
            'text' => 'Project Data Contact',
            'guidance' => 'Name (if different to above), telephone and email contact details',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 109,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '8',
            'order' => 8,
            'text' => 'Date of First Version',
            'guidance' => 'Date the first version of the DMP was completed',
            'input_type_id' => 8
        ));
        
        Question::create(array(
            'id' => 110,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '9',
            'order' => 9,
            'text' => 'Date of Last Update',
            'guidance' => 'Date the DMP was last changed',
            'input_type_id' => 8
        ));
        
        Question::create(array(
            'id' => 111,
            'template_id' => 3,
            'section_id' => 11,
            'keynumber' => '10',
            'order' => 10,
            'text' => 'Related Policies',
            'guidance' => 'Questions to consider: Are there any existing procedures that you will base your approach on? Does your department/group have data management guidelines? Does your institution have a data protection or security policy that you will follow? Does your institution have a Research Data Management (RDM) policy? Does your funder have a Research Data Management policy? Are there any formal standards that you will adopt? Guidance: List any other relevant funder, institutional, departmental or group policies on data management, data sharing and data security. Some of the information you give in the remainder of the DMP will be determined by the content of other policies. If so, point/link to them here.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 112,
            'template_id' => 3,
            'section_id' => 12,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'What data will you collect or create?',
            'guidance' => 'Questions to consider: What type, format and volume of data? Do your chosen formats and software enable sharing and long-term access to the data? Are there any existing data that you can reuse? Guidance: Give a brief description of the data, including any existing data or third-party sources that will be used, in each case noting its content, type and coverage. Outline and justify your choice of format and consider the implications of data format and data volumes in terms of storage, backup and access.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 113,
            'template_id' => 3,
            'section_id' => 12,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'How will the data be collected or created?',
            'guidance' => 'Questions to Consider: What standards or methodologies will you use? How will you structure and name your folders and files? How will you handle versioning? What quality assurance processes will you adopt? Guidance: Outline how the data will be collected/created and which community data standards (if any) will be used. Consider how the data will be organised during the project, mentioning for example naming conventions, version control and folder structures. Explain how the consistency and quality of data collection will be controlled and documented. This may include processes such as calibration, repeat samples or measurements, standardised data capture or recording, data entry validation, peer review of data or representation with controlled vocabularies.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 114,
            'template_id' => 3,
            'section_id' => 13,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'What documentation and metadata will accompany the data?',
            'guidance' => 'Questions to consider: What information is needed for the data to be to be read and interpreted in the future? How will you capture / create this documentation and metadata? What metadata standards will you use and why? Guidance: Describe the types of documentation that will accompany the data to help secondary users to understand and reuse it. This should at least include basic details that will help people to find the data, including who created or contributed to the data, its title, date of creation and under what conditions it can be accessed. Documentation may also include details on the methodology used, analytical and procedural information, definitions of variables, vocabularies, units of measurement, any assumptions made, and the format and file type of the data. Consider how you will capture this information and where it will be recorded. Wherever possible you should identify and use existing community standards.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 115,
            'template_id' => 3,
            'section_id' => 14,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'How will you manage any ethical issues?',
            'guidance' => 'Questions to consider: Have you gained consent for data preservation and sharing? How will you protect the identity of participants if required? e.g. via anonymisation How will sensitive data be handled to ensure it is stored and transferred securely? Guidance: Ethical issues affect how you store data, who can see/use it and how long it is kept. Managing ethical concerns may include: anonymisation of data; referral to departmental or institutional ethics committees; and formal consent agreements. You should show that you are aware of any issues and have planned accordingly. If you are carrying out research involving human participants, you must also ensure that consent is requested to allow data to be shared and reused.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 116,
            'template_id' => 3,
            'section_id' => 14,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'How will you manage copyright and Intellectual Property Rights (IPR) issues?',
            'guidance' => 'Questions to consider: Who owns the data? How will the data be licensed for reuse? Are there any restrictions on the reuse of third-party data? Will data sharing be postponed / restricted e.g. to publish or seek patents? Guidance: State who will own the copyright and IPR of any data that you will collect or create, along with the licence(s) for its use and reuse. For multi-partner projects, IPR ownership may be worth covering in a consortium agreement. Consider any relevant funder, institutional, departmental or group policies on copyright or IPR. Also consider permissions to reuse third-party data and any restrictions needed on data sharing.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 117,
            'template_id' => 3,
            'section_id' => 15,
            'keynumber' => '1',
            'order' => 1,
            'text' => 'How will the data be stored and backed up during the research?',
            'guidance' => 'Questions to consider: Do you have sufficient storage or will you need to include charges for additional services? How will the data be backed up? Who will be responsible for backup and recovery? How will the data be recovered in the event of an incident? Guidance: State how often the data will be backed up and to which locations. How many copies are being made? Storing data on laptops, computer hard drives or external storage devices alone is very risky. The use of robust, managed storage provided by university IT teams is preferable. Similarly, it is normally better to use automatic backup services provided by IT Services than rely on manual processes. If you choose to use a third-party service, you should ensure that this does not conflict with any funder, institutional, departmental or group policies, for example in terms of the legal jurisdiction in which data are held or the protection of sensitive data.',
            'input_type_id' => 2
        ));
        
        Question::create(array(
            'id' => 118,
            'template_id' => 3,
            'section_id' => 16,
            'keynumber' => '2',
            'order' => 2,
            'text' => 'How will you manage access and security?',
            'guidance' => 'Questions to consider: What are the risks to data security and how will these be managed? How will you control access to keep the data secure? How will you ensure that collaborators can access your data securely? If creating or collecting data in the field how will you ensure its safe transfer into your main secured systems? Guidance: If your data is confidential (e.g. personal data not already in the public domain, confidential information or trade secrets), you should outline any appropriate security measures and note any formal standards that you will comply with e.g. ISO 27001.',
            'input_type_id' => 2
        ));
        

        
        /*
        Question::create(array(
            'template_id' => 1,
            'section_id' => 2,
            'keynumber' => '3',
            'order' => 3,
            'text' => 'In welchen Dateiformaten werden die Daten vorliegen? Mit welchen Datenformaten wird gearbeitet?',
            //'guidance' => '',
            'reference' => 'WissGrid: 1.3f'
        ));
   
        
        /*
        
        
        
        
        
        
        
        

               
        
        
                 
        
                 

        
        */
    }
}

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


/*
why not like this!?!
SELECT
FROM questions
INNER JOIN question_inputs ON questions.id = question_inputs.question_id
*/

/*

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
 */