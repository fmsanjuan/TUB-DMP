<?php

class TextAnswer extends Eloquent
{    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'text_answers';
    //protected $softDelete = true;

    protected $guarded = array();
    //$table->primary(array('first', 'last'));   
   
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/    
    
    // A Text Answer belongs to one Question
    public function question()
    {
        return $this->belongsTo('Question');
    }
    
    // A Text Answer belongs to one User
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
        QuestionAnswerRel::where("text_answer_id", '=', $this->id)->where('user_id', '=', Auth::user()->id)->delete();
        // // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    
    public static function getQuestionInputAnswer( $plan_id, $question_id, $question_input_id )
    {
        $answer = TextAnswer::where('plan_id','=',$plan_id)
            ->where('question_input_id','=',$question_input_id)
            ->first();   
        return $answer;
    }
    
    public static function getQuestionTextAnswer( $plan_id, $question_id )
    {
        $answer = TextAnswer::where('plan_id','=',$plan_id)
            ->where('question_id','=',$question_id)
            ->get();
        
        
        
        return $answer;
    }
    
}