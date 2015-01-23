<?php

class OptionAnswer extends Eloquent
{    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'option_answers';
   
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/    
    
    // An Option Answer belongs to one Question
    public function question()
    {
        return $this->belongsTo('Question');
    }
    
    // An Option Answer belongs to one User
    public function user()
    {
        return $this->belongsTo('User');
    }  
    
    public function answer_relation()
    {
        return $this->hasMany('QuestionAnswerRel');
    }  
    
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
        
    public function delete()
    {
        // delete all related photos 
        //$this->answer_relation()->delete();
        QuestionAnswerRel::where("option_answer_id", $this->id)->where('user_id', '=', Auth::user()->id)->delete();
        // // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    
    public static function getQuestionInputAnswer( $question, $plan, $question_input_id )
    {
        $answer = TextAnswer::where('plan_id','=',$plan->id)
                        ->where('question_input_id','=',$question_input_id)
                        ->first();   
        return $answer;
    }
    
    public static function getQuestionTextAnswer( $question, $plan )
    {
        $answer = TextAnswer::where( 'plan_id', '=', $plan->id )
                        ->where( 'question_id', '=', $question->id )
                        ->first();
        return $answer;
    }
    
}