<?php

class TemplatesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('templates')->delete();
        
        Template::create(array(
            'name' => 'TU Berlin Standard',
            'institution_id' => 1,
            'active' => 1
        ));
        
        Template::create(array(
            'name' => 'TU Berlin Datenmengen',
            'institution_id' => 1,
            'active' => 0
        ));        
        
        Template::create(array(
            'name' => 'DFG-Vorlage',
            'institution_id' => 3,
            'active' => 0
        ));
        
        Template::create(array(
            'name' => 'BMBF-Vorlage',
            'institution_id' => 4,
            'active' => 0
        ));        
        
    }
}