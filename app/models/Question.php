<?php

class Question extends Eloquent
{   
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'questions';
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    // A Question belongs to one Template
    public function template() {
        return $this->belongsTo('Template');
    }
    
    // A Question belongs to one Section
    public function section() {
        return $this->belongsTo('Section');
    } 
    
    // A Question has one Input Type
    public function inputType() {
        return $this->belongsTo('InputType');
    }
  
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
    public static function hasChildQuestions( $question ) {
        $questions = Question::where( 'parent_question_id', '=', $question->id )->get();
        return $questions;
    }
}