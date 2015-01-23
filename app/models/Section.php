<?php

class Section extends Eloquent
{    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'sections';
   
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    // A Section belongs to one Template
    public function template()
    {
        return $this->belongsTo('Template');
    }
    
    // A Section has many Questions
    public function question()
    {
        return $this->hasMany('Question');
    }
    
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
    public static function isComplete( Section $section ) {
        
        $section_questions = Question::where( 'section_id', $section->id )->get();
        foreach( $section_questions as $section_question )
        {
            $this_answer = TextAnswer::where( 'question_id', '=', $section_question['id'] )->first();
            //echo $section_question['id'];
            //echo '-';
            // $this_answer['question_id'];
            //echo '<br/>';
                        
        }
    }
    
    public static function getPlanSections( $template_id ) {
        return $sections = Section::where( 'template_id', $template_id )->orderby('order')->get();
    }
}