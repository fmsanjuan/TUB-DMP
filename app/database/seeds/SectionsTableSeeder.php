<?php

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sections')->delete();
        
        Section::create(array(
            'id' => 1,
            'template_id' => 1,
            'keynumber' => 1,
            'order' => 1,
            'name' => 'Allgemeine Angaben zu den Rahmendaten des Vorhabens'
        ));
        
        Section::create(array(
            'id' => 2,
            'template_id' => 1,
            'keynumber' => 2,
            'order' => 2,
            'name' => 'Arten von Daten'            
        ));
        
        Section::create(array(
            'id' => 3,
            'template_id' => 1,
            'keynumber' => 3,
            'order' => 3,
            'name' => 'Aufbewahrung'            
        ));

        Section::create(array(
            'id' => 4,
            'template_id' => 1,
            'keynumber' => 4,
            'order' => 4,
            'name' => 'Nachnutzung und Sichtbarkeit'            
        ));

        Section::create(array(
            'id' => 5,
            'template_id' => 1,
            'keynumber' => 5,
            'order' => 5,
            'name' => 'Datenschutz — personenbezogene Daten'            
        ));

        Section::create(array(
            'id' => 6,
            'template_id' => 1,
            'keynumber' => 6,
            'order' => 6,
            'name' => 'Urheberrecht'
            
        ));

        Section::create(array(
            'id' => 7,
            'template_id' => 1,
            'keynumber' => 7,
            'order' => 7,
            'name' => 'Kosten- und Aufwandseinschätzung des Forschungsdaten-Managements'
        ));
        
        
        
        Section::create(array(
            'id' => 11,
            'template_id' => 3,
            'keynumber' => 1,
            'order' => 1,
            'name' => 'Administrative Data'
        ));
        
        Section::create(array(
            'id' => 12,
            'template_id' => 3,
            'keynumber' => 2,
            'order' => 2,
            'name' => 'Data Collection'
        ));
        
        Section::create(array(
            'id' => 13,
            'template_id' => 3,
            'keynumber' => 3,
            'order' => 3,
            'name' => 'Documentation and Metadata'
        ));

        Section::create(array(
            'id' => 14,
            'template_id' => 3,
            'keynumber' => 4,
            'order' => 4,
            'name' => 'Ethics and Legal Compliance'
        ));
        
        Section::create(array(
            'id' => 15,
            'template_id' => 3,
            'keynumber' => 5,
            'order' => 5,
            'name' => 'Storage and Backup'
        ));
        
        Section::create(array(
            'id' => 16,
            'template_id' => 3,
            'keynumber' => 6,
            'order' => 6,
            'name' => 'Selection and Preservation'
        ));
        
        Section::create(array(
            'id' => 17,
            'template_id' => 3,
            'keynumber' => 7,
            'order' => 7,
            'name' => 'Data Sharing'
        ));
        
        Section::create(array(
            'id' => 18,
            'template_id' => 3,
            'keynumber' => 8,
            'order' => 8,
            'name' => 'Responsibilities and Resources'
        ));
        
        
        
    }
}