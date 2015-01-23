<?php

class PlanHelpers {

    /*
    public static function getRelatedQuestions( $question_id ) {
        $related = Question::where( 'id', $question_id )->get();
        return $related;
    }
    */

    public static function getAnswer( $plan_id, $question_id ) {
        $question_input_fields = QuestionInput::getQuestion2Input( $question_id );
        $html = '';
        
        foreach( $question_input_fields as $question_input_field ) {

            $this_question_input_field = QuestionInput::getQuestionInputData( $question_id, $question_input_field->question_input_id )->first();
            $this_question_input_type = InputType::where('id','=',$this_question_input_field->input_type_id)->first()->name;
            $this_question_input_answer = Answer::getQuestionInputAnswer( $plan_id, $question_id, $question_input_field->question_input_id );
                           
            $answer = $this_question_input_answer['text'];

            if( !empty( $answer ) && isset( $this_question_input_field->prepend ) ) {
                $html .= '<br/><span class="answer-prepend">' . $this_question_input_field->prepend . '</span> ';
            }
            
            if( str_contains( $answer, '|') ) {
                
                switch( $this_question_input_type ) {
                    case 'list':
                        $answer_array = explode('|',$answer);
                        $html .= '<ul class="plan-answer">';
                        foreach( $answer_array as $answer ) {
                            $html .= '<li>' . $answer . '</li>';                            
                        }
                        $html .= '</ul>';                        
                        break;
                    case 'checkbox':
                        $answer_array = explode('|',$answer);
                        $html .= '<ul class="plan-answer">';
                        foreach( $answer_array as $answer ) {
                            $html .= '<li>' . $answer . '</li>';                            
                        }
                        $html .= '</ul>';
                        break;
                    case 'daterange':
                        $answer_array = explode('|',$answer);
                        $html .= $answer_array[0] . ' - ' . $answer_array[1];                                                    
                        break;
                    case 'valuerange':
                        $answer_array = explode('|',$answer);
                        $html .= $answer[0] . ' - ' . $answer[1];                                                    
                        break;
                    default:
                        $answer = str_replace('|',',', $answer);
                        break;
                }
            } else {
                $html .= $answer;
            }            
            if( !empty( $answer ) && isset( $this_question_input_field->append ) ) {
                $html .= ' <span class="answer-append">' . $this_question_input_field->append . '</span>';
            }            
            
        }
        return $html;
    }
    
    public static function getFieldValuesArray( $question_input_values ) {
        if( strpos($question_input_values ,'|') == true ) {
            $values_array = explode( '|',$question_input_values );  
        } else {
             switch( $question_input_values ) {
                case '_FILETYPES_':
                    $values_array = FileType::getFileTypesArray();
                    break;
                case '_FILEFORMATS_':
                    $values_array = FileFormat::getFileFormatsArray();
                    break;
                default:
                    $values_array = array();
                    break;
            }
        }
        return $values_array;
    }
    
    
    public static function getInputField( $plan_id, $question_id ) {

        // returns array with rows
        // [{"question_id":"1","question_input_id":"1"},{"question_id":"1","question_input_id":"2"}]
        // [{"question_id":"2","question_input_id":"2"}]
        
        //$filetypes = FileType::getFileTypes();        
        //$fileformats = QuestionInput::getQuestion2Input( $question_id );        
        $question_input_fields = QuestionInput::getQuestion2Input( $question_id );
  
        $html = '';
        
        foreach( $question_input_fields as $question_input_field ) {

            $this_question_input_field = QuestionInput::getQuestionInputData( $question_id, $question_input_field->question_input_id )->first();
            $this_question_input_type = InputType::where('id','=',$this_question_input_field->input_type_id)->first()->name;
            $this_question_input_answer = Answer::getQuestionInputAnswer( $plan_id, $question_id, $question_input_field->question_input_id );

            // FIX ME: remove question_id since it's not necessary, also from DB schema in answers table            
            $input_name = $plan_id . '-' . $question_input_field->question_input_id;
            
            if( count( $this_question_input_answer ) > 0 ) {
                $answer = $this_question_input_answer['text'];
            } else {
                $answer = $this_question_input_field->default;
            }

            if( isset( $this_question_input_field->comment ) ) {
                $comment = '<span class="comment">' . $this_question_input_field->comment . '</span>';
            } else {
                $comment = null;
            }
            
            switch( $this_question_input_type ) {
                case 'text':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }
                    $html .= Form::Text( $input_name, $answer, array('class' => 'question form-control') );

                    $html .= $comment;
                    break;
                case 'textarea':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }                    
                    $html .= Form::Textarea( $input_name, $answer, array('rows' => '3', 'class' => 'question form-control') );
                    $html .= $comment;                    
                    break;
                case 'select':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }
                    
                    $select_array = array('' => 'Bitte wählen Sie aus');
                    $values_array = PlanHelpers::getFieldValuesArray( $this_question_input_field->values );
                    
                    foreach( $values_array as $k => $v ) {
                        $select_array[$v] = $v;
                    }
                                                            
                    $html .= Form::select($input_name, $select_array, $answer, array('class' => 'question form-control'));
                    $html .= $comment;
                    break;
                case 'multiselect':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }
                    
                    //$select_array = array('' => 'Bitte wählen Sie aus');
                    $values_array = PlanHelpers::getFieldValuesArray( $this_question_input_field->values );
                    
                    foreach( $values_array as $k => $v ) {
                        $select_array[$v] = $v;
                    }
                                                            
                    $html .= Form::select($input_name, $select_array, $answer, array('class' => 'question form-control','multiple','size' => '10'));
                    $html .= $comment;
                    break;    
                case 'list':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }
    		      	$html .= '<div class="tagsinput">';
                    $html .= '<script>$(".tags").importTags("' . $answer . '");</script>';              
                    $html .= Form::hidden( $input_name, '', array('class' => 'tags_list') );
                    $html .= Form::Text( $input_name, $answer, array('class' => 'tags form-control') );
                    $html .= '</div>';
                    $html .= $comment;                
                    break;      
                case 'checkbox':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }
                    $values_array = PlanHelpers::getFieldValuesArray( $this_question_input_field->values );
                    $answers_array = explode('|',$answer);
                    foreach( $values_array as $value ) {
                        $html .= '<div class="checkbox">';
                            $html .= '<label>';
                            $html .= Form::checkbox( $input_name . '[]', $value, in_array($value, $answers_array), array('class' => 'question-checkbox'));
                            $html .= $value;
                            $html .= '</label>';
                        $html .= '</div>';
                    }                    
                    $html .= $comment;                    
                    break;      
                case 'radio':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }                    
                    $values_array = PlanHelpers::getFieldValuesArray( $this_question_input_field->values );
                    foreach( $values_array as $value ) {
                        if( $value == $answer ) {
                            $checked = true;
                        } else {
                            $checked = false;                            
                        }
                        $html .= '<div class="radio">';
                            $html .= '<label>';
                            $html .= Form::radio( $input_name, $value, $checked, array('class' => 'question-radio'));
                            $html .= $value;
                            $html .= '</label>';
                        $html .= '</div>';
                    }
                    $html .= $comment;                    
                    break;
                case 'date':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }                                        
                    $html .= Form::Text( $input_name, $answer, array('class' => 'question question-date form-control') );
                    break;      
                case 'daterange':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= '<br/>' . $this_question_input_field->prepend . '<br/>';
                    }
                    $answers_array = explode('|',$answer);
                    if( count($answers_array) > 1 ) {
                        $date_from = $answers_array[0];
                        $date_to = $answers_array[1];                        
                    } else {
                        $date_from = null;
                        $date_to = null;                                                
                    }
                    $html .= Form::Text( $input_name . '[]', $date_from, array('class' => 'question question-daterange form-control') );
                    $html .= ' - ';
                    $html .= Form::Text( $input_name . '[]', $date_to, array('class' => 'question question-daterange form-control') );
                    $html .= '<br/>' . $comment;                    
                    break;
                case 'value':
                    if( isset( $this_question_input_field->prepend ) ) {
                        $html .= $this_question_input_field->prepend . '&nbsp;&nbsp;';
                    }                    
                    $values_array = explode('|',$this_question_input_field->values);
                    if( count($values_array) > 2 ) {
                        $slider_min = $values_array[0];
                        $slider_max = $values_array[1];
                        $slider_step = $values_array[2];
                    } else {
                        $slider_min = 0;
                        $slider_max = 1000;                                               
                    }                    
                    $html .= Form::Text( $input_name, $answer, array('class' => 'question question-value') );
                    if( isset( $this_question_input_field->append ) ) {
                        $html .= '&nbsp;&nbsp;' . $this_question_input_field->append;
                    }
                    $html .= '<div class="question question-value-slider" min="' . $slider_min . '" max="' . $slider_max . '" step="' . $slider_step  . '"></div>';
                    //$html .= '<div class="question question-value-slider" data-slider-min="' . $slider_min . '" data-slider-max="' . $slider_max . '" data-slider-step="' . $slider_step . '" data-slider-value="' . $answer . '"></div>';                    
                    // data-slider-value="[250,450]"
                    $html .= $comment;                    
                    break;
                case 'valuerange':
                    $html .= 'VALUERANGE ' . $input_name;
                    $html .= $comment;                    
                    break;
                case 'boolean':
                    $question_default = $this_question_input_field->default;
                    /* FIX THIS: pretty nasty routine */
                    if( $answer ) {
                        if( strcmp( $answer, 'Ja' ) === 0 ) {
                            $checked_yes = true;
                            $checked_no = false;
                        } else {
                            $checked_yes = false;
                            $checked_no = true;                        
                        }
                    } else {
                        if( strcmp( $question_default, 'Ja' ) === 0 ) {
                            $checked_yes = true;
                            $checked_no = false;

                        } else {
                            $checked_yes = false;
                            $checked_no = true;                        
                        }
                    }
                    
                    $html .= '<div class="radio">';
                        $html .= '<label>';
                        $html .= Form::radio( $input_name, 'Ja', $checked_yes, array('class' => 'question-radio'));
                        $html .= 'Ja';
                        $html .= '</label>';
                    $html .= '</div>';
                    $html .= '<div class="radio">';
                        $html .= '<label>';
                        $html .= Form::radio( $input_name, 'Nein', $checked_no, array('class' => 'question-radio'));
                        $html .= 'Nein';
                        $html .= '</label>';
                    $html .= '</div>';                    
                    $html .= '<br/>' . $comment;                    
                    break;
                default:
                    $html .= Form::Text( $input_name, array('class' => 'question form-control') );
                    $html .= $comment;
                    break;
            }
        }
        return $html;
    }
    
    public static function isSectionComplete( $plan_id, $section_id ) {
        // $this_section_answers = Answer::getQuestionInputAnswer( $plan_id, $question_id, $question_input_field->question_input_id );
    }
    
}