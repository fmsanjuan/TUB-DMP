<?php

class FileType extends Eloquent 
{   
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    //use SoftDeletingTrait;
    protected $table = 'file_types';
    
    //protected $hidden = array('created_at', 'updated_at');
    
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
    
   public static function getFileTypesArray() {
        $filetypes = FileType::orderBy('name', 'ASC')->lists('id','name');
        foreach( $filetypes as $k => $v ) {
            $filetypesArr[$k] = $k;
        }
        return $filetypesArr;
    }
}