<?php

class Plan extends Eloquent
{    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'plans';    
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    // A Plan has one Template
    public function template()
    {
        return $this->belongsTo('Template');
    }
    
    // A Plan belongs to one User
    public function user()
    {
        return $this->belongsTo('User');
    }
     
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
    public static function getPlanOwner( $project_number ) {
        return Plan::where( 'project_number', '=', $project_number )->first();
    }
    
    public static function getPlan( $project_number ) 
    {
        return Plan::where( 'project_number', '=', $project_number )->first();       
    }
}