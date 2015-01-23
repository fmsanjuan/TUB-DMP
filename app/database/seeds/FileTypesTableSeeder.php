<?php

class FileTypesTableSeeder extends Seeder
{    
    public function run()
    {
        DB::table('file_types')->delete();
      
        FileType::create(array(
            'name' => 'Zeitschriebe'            
        ));
        
        FileType::create(array(
            'name' => 'Skripte'            
        ));
        
        FileType::create(array(
            'name' => 'Simulink-Modelle'            
        ));
        
        FileType::create(array(
            'name' => 'controlDesk-Daten'            
        ));
        
        FileType::create(array(
            'name' => 'CAD-Daten'            
        ));
        
        FileType::create(array(
            'name' => 'Bilder'            
        ));
        
        FileType::create(array(
            'name' => 'PIV-Dateien'            
        ));
        
        FileType::create(array(
            'name' => 'Dokumentation'            
        ));
        
        FileType::create(array(
            'name' => 'ASCII-Daten'            
        ));

        FileType::create(array(
            'name' => 'Binärdaten'            
        ));        
        
        FileType::create(array(
            'name' => 'Berechnungen'            
        ));
        
        FileType::create(array(
            'name' => 'Messdaten'            
        ));
        
        FileType::create(array(
            'name' => 'Setup-Dateien'            
        ));
        
        FileType::create(array(
            'name' => 'Midi-Dateien'            
        ));
        
        FileType::create(array(
            'name' => 'Audio'            
        ));
        
        FileType::create(array(
            'name' => 'Video'            
        ));
        
        FileType::create(array(
            'name' => 'Archive'            
        ));
        
    }    
   
}