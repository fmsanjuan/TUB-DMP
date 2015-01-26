<?php

class QuestionAnswerRel extends Eloquent {
    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'question_answer_rel';
    public $timestamps = true;
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/    
    
    // 
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    // 
    public function question()
    {
        return $this->belongsTo('Question');
    }
    
    public function plan()
    {
        return $this->belongsTo('Plan');
    }
    

    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/    
    
    public static function getAnswerCount( Plan $plan )
    {
        $questions = Template::getQuestions( $plan->template->id );
        $count = 0;
        foreach( $questions as $question )
        {
            Debugbar::info( $question->text );
            if( !is_null( QuestionAnswerRel::getAnswer( $question, $plan, null ) ) )
            {
                //Debugbar::info( $question->text );
                $count++;
            }
        }
        return $count;
    }
    
    public static function getAnswer( Question $question, Plan $plan, $output = 'form' )
    {
        $option_input_value = array();
        
        //$input_value = null;
        
        $relation_results = QuestionAnswerRel::where( 'question_id', '=', $question->id )
            ->where( 'plan_id', '=', $plan->id )    
            ->where( 'user_id', '=', Auth::user()->id )
            ->get();
    
        //Debugbar::info( $relation_results );
        
        // IF NO ANSWER IS PRESENT - RETURN NULL
        if( $relation_results->isEmpty() )
        {            
            return null;
        }
        // IF ANSWER VALUE(S) IS/ARE PRESENT ...
        else
        {
            foreach( $relation_results as $relation_result )
            {
                // TEXT ANSWER
                if( $relation_result->text_answer_id != null && $relation_result->option_answer_id == null && $relation_result->range_answer_id == null && $relation_result->list_answer_id == null )
                {                    
                    $input_value[0] = 'text';
                    
                    $text_answer = TextAnswer::where('id', '=', $relation_result->text_answer_id)->first();
                                      
                    if( count($text_answer) != 0 )
                    {
                        $input_value[] = $text_answer->text;
                    }
                    else
                    {
                        $input_value = null;
                    }                    
                }
                
                // OPTION ANSWER               
                if( $relation_result->option_answer_id != null && $relation_result->text_answer_id == null && $relation_result->range_answer_id == null && $relation_result->list_answer_id == null )
                {
                    $input_value[0] = 'option';
                    
                    $option_answers = OptionAnswer::where( 'id', '=', $relation_result->option_answer_id )->get();
                    
                    foreach( $option_answers as $option_answer )
                    {
                        $question_option = QuestionOption::where( 'id', '=', $option_answer->question_option_id )->first();                        
                        $input_value[] = $question_option->id;                        
                    }                   
                }
                
                // RANGE ANSWER
                if( $relation_result->range_answer_id != null && $relation_result->text_answer_id == null && $relation_result->option_answer_id == null && $relation_result->list_answer_id == null )
                {
                    $input_value[0] = 'range';
                    $range_answers = RangeAnswer::where( 'id', '=', $relation_result->range_answer_id )->get();
                    foreach( $range_answers as $range_answer )
                    {
                        $input_value[] = $range_answer->alpha;
                        $input_value[] = $range_answer->omega;
                    }
                }
                
                // LIST ANSWER
                if(  $relation_result->list_answer_id != null && $relation_result->range_answer_id == null && $relation_result->text_answer_id == null && $relation_result->option_answer_id == null )
                {
                    $input_value[0] = 'list';
                    $list_answers = ListAnswer::where( 'id', '=', $relation_result->list_answer_id )->get();
                    foreach( $list_answers as $list_answer )
                    {
                        $input_value[] = $list_answer->text;
                    }
                }      
                
            }
            
            //Debugbar::info( $question->id . ' => ' );
            //Debugbar::warning( $input_value );
            
            return $input_value;
        }
     }

   
   
}