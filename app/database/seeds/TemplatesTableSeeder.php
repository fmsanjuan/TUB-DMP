<?php

class TemplatesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('templates')->delete();
        
        Template::create(array(
            'id' => 1,
            'name' => 'TU Berlin Standard',
            'institution_id' => 1,
            'active' => 1
        ));
        
        Template::create(array(
            'id' => 2, 
            'name' => 'TU Berlin Datenmengen',
            'institution_id' => 1,
            'active' => 1
        ));
        
        Template::create(array(
            'id' => 3, 
            'name' => 'DCC checklist 4.0',
            'institution_id' => 1,
            'active' => 1
        ));
        
        Template::create(array(
            'id' => 4, 
            'name' => 'DFG-Vorlage',
            'institution_id' => 3,
            'active' => 0
        ));
        
        Template::create(array(
            'id' => 5,
            'name' => 'BMBF-Vorlage',
            'institution_id' => 4,
            'active' => 0
        ));        
        
    }
}