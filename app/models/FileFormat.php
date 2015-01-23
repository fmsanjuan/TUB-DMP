<?php

class FileFormat extends Eloquent
{   
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    //use SoftDeletingTrait;
    protected $table = 'file_formats';
   
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    
    
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/    
    
   public static function getFileFormatsArray() {
        $fileformats = FileFormat::orderBy('name', 'ASC')->lists('id','name');
        foreach( $fileformats as $k => $v ) {
            $fileformatsArr[$k] = $k;
        }
        return $fileformatsArr;
    }
   
}