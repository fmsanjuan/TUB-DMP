<?php

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sections')->delete();
        
        Section::create(array(
            'template_id' => 1,
            'keynumber' => 1,
            'order' => 1,
            'name' => 'Allgemeine Angaben zu den Rahmendaten des Vorhabens'
        ));
        
        Section::create(array(
            'template_id' => 1,
            'keynumber' => 2,
            'order' => 2,
            'name' => 'Arten von Daten'            
        ));
        
        Section::create(array(
            'template_id' => 1,
            'keynumber' => 3,
            'order' => 3,
            'name' => 'Aufbewahrung'            
        ));

        Section::create(array(
            'template_id' => 1,
            'keynumber' => 4,
            'order' => 4,
            'name' => 'Nachnutzung und Sichtbarkeit'            
        ));

        Section::create(array(
            'template_id' => 1,
            'keynumber' => 5,
            'order' => 5,
            'name' => 'Datenschutz — personenbezogene Daten'            
        ));

        Section::create(array(
            'template_id' => 1,
            'keynumber' => 6,
            'order' => 6,
            'name' => 'Urheberrecht'
            
        ));

        Section::create(array(
            'template_id' => 1,
            'keynumber' => 7,
            'order' => 7,
            'name' => 'Kosten- und Aufwandseinschätzung des Forschungsdaten-Managements'
        ));
        
    }
}