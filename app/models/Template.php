<?php

class Template extends Eloquent
{   
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'templates';
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/    
    
    // A Template belongs to one Institution
    public function institution() {
        return $this->belongsTo('Institution');
    }
    
    // A Template has many Sections
    public function section() {
        return $this->hasMany('Section');
    }
    
    //A Template has many Questions
    public function question()
    {
        return $this->hasMany('Question');
    }
    
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
    public static function getPlanTemplate( $plan_id ) {
        return Template::where( 'id', $plan->template_id )->first();        
        // rather useless since we already have the template_id (maybe checks whether user belongs to institution)        
    }
    
    public static function getQuestions( $template_id ) {
        $questions = Question::where( 'template_id', $template_id )->whereNull( 'parent_question_id' )->get();
        return $questions;
    }
    
}