<?php

class Institution extends Eloquent
{    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'institutions';
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    // An Institution has many Users
    public function user()
    {
        return $this->hasMany('User');
    }
    
    // An Institution has many Templates
    public function template()
    {
        return $this->hasMany('Template');
    }
    
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
    public static function getInstitutionName( $institution_id )
    {
        $institution = Institution::where('id', '=', $institution_id)->first();
        return $institution->name;
    }
    
}