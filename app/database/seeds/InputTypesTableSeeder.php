<?php

class InputTypesTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('input_types')->delete();
        
        InputType::create(array(
            'id' => 1,
            'name' => 'Textfeld, einzeilig',
            'method' => 'text'
        ));    
        
        InputType::create(array(
            'id' => 2,
            'name' => 'Textfeld, mehrzeilig',
            'method' => 'textarea'
        ));
        
        InputType::create(array(
            'id' => 3,
            'name' => 'Auswahlbox, einzeilig',
            'method' => 'select'
        ));

        InputType::create(array(
            'id' => 4,
            'name' => 'Auswahlbox, mehrzeilig',
            'method' => 'multiselect'
        ));
        
        InputType::create(array(
            'id' => 5,
            'name' => 'Liste',
            'method' => 'list'
        ));

        InputType::create(array(
            'id' => 6,
            'name' => 'Checkboxen',
            'method' => 'checkboxes'
        )); 
        
        InputType::create(array(
            'id' => 7,
            'name' => 'Radiobuttons',
            'method' => 'radiobuttons'
        )); 
        
        InputType::create(array(
            'id' => 8,
            'name' => 'Datumsfeld',
            'method' => 'date'
        ));

        InputType::create(array(
            'id' => 9,
            'name' => 'Datumsbereich',
            'method' => 'daterange'
        ));
        
        InputType::create(array(
            'id' => 10,
            'name' => 'Wertefeld',
            'method' => 'value'
        ));

        InputType::create(array(
            'id' => 11,
            'name' => 'Wertebereich',
            'method' => 'valuerange'
        ));        
        
        InputType::create(array(
            'id' => 12,
            'name' => 'Ja/Nein',
            'method' => 'boolean'
        ));
        
        InputType::create(array(
            'id' => 13,
            'name' => 'Plain (not editable)',
            'method' => 'plain'
        ));
    }
}