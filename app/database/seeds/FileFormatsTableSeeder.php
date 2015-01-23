<?php

class FileFormatsTableSeeder extends Seeder
{    
    public function run()
    {
        DB::table('file_formats')->delete();
      
        FileFormat::create(array(
            'name' => 'm'            
        ));
        
        FileFormat::create(array(
            'name' => 'xls'            
        ));        

        FileFormat::create(array(
            'name' => 'f90'            
        ));  
        
        FileFormat::create(array(
            'name' => 'dat'
        ));        
        
        FileFormat::create(array(
            'name' => 'mat'            
        ));
        
        FileFormat::create(array(
            'name' => 'tif'            
        ));        
        
        FileFormat::create(array(
            'name' => 'bmp'            
        ));
        
        FileFormat::create(array(
            'name' => 'txt'            
        ));
        
        FileFormat::create(array(
            'name' => 'docx'            
        ));        

        FileFormat::create(array(
            'name' => 'xlsx'            
        ));    
        
        FileFormat::create(array(
            'name' => 'ppt'            
        ));            
        
        FileFormat::create(array(
            'name' => 'slwprt'            
        ));         

        FileFormat::create(array(
            'name' => 'slwasm'            
        ));         
        
        FileFormat::create(array(
            'name' => 'step'            
        ));          

        FileFormat::create(array(
            'name' => 'iges'            
        ));        
        
        FileFormat::create(array(
            'name' => 'py'            
        ));
        
        FileFormat::create(array(
            'name' => 'c'            
        ));
        
        FileFormat::create(array(
            'name' => 'sh'            
        ));
        
        FileFormat::create(array(
            'name' => 'mdl'            
        ));
        
        FileFormat::create(array(
            'name' => 'lay'            
        ));       
        
        FileFormat::create(array(
            'name' => 'pdf'            
        ));        
        
        FileFormat::create(array(
            'name' => 'stl'            
        ));
        
        FileFormat::create(array(
            'name' => 'jpg'            
        ));         
        
        FileFormat::create(array(
            'name' => 'bmp'            
        ));
        
    }    
   
}