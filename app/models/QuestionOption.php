<?php

class QuestionOption extends Eloquent
{   
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'question_options';
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    // A Question Option belongs to one Question
    public function question() {
        return $this->belongsTo('Question');
    }
    
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
    public static function getOptionText( $option_id )
    {
        $option = QuestionOption::where( 'id', '=', $option_id )->first();
        if( $option )
        {
            return $option->text;
        }
        else
        {
            return null;
        }
    }
    
    public static function getDefault( Question $question )
    {
        $default_option = QuestionOption::where( 'question_id', '=', $question->id )->where( 'default', '=', 1 )->first();
        if( $default_option )
        {
            return $default_option->id;
        }
        else
        {
            return null;
        }
    }
}