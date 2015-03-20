<?php

/*
|--------------------------------------------------------------------------
| Inital Form Macro
| Calls the specific form input macro (see below)
|--------------------------------------------------------------------------
*/

Form::macro('macro_test', function( Question $question, Plan $plan )
{   
    $macro_method = 'question_' . $question->inputType->method;    
    $input_name = $question->id; 
    $input_value = QuestionAnswerRel::getAnswer( $question, $plan );
    if( !is_null( $input_value ) )
    {
        array_splice( $input_value, 0, 1 );
    }
    $default_value = QuestionOption::getDefault( $question );

    //echo gettype( $input_value );
    //echo '<br/>';
    //var_dump( $input_value );
    
    $html = Form::$macro_method( $question, $input_name, $input_value, $default_value );
    return $html;
});

/*
|--------------------------------------------------------------------------
| ID 1
| Textfeld, einzeilig
|--------------------------------------------------------------------------
*/

Form::macro('question_text', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{       
    $html = '';    
    $html .= $question->prepend;
    $html .= Form::hidden( $input_name . '[]', 'text' );
    $html .= Form::Text( $input_name . '[]', $input_value[0], array('class' => 'typeahead question form-control', 'title' => $question->guidance ) );
    $html .= $question->append;
    return $html;
});

/*
|--------------------------------------------------------------------------
| ID 2
| Textfeld, mehrzeilig
|--------------------------------------------------------------------------
*/

Form::macro('question_textarea', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $html = '';
    $html .= $question->prepend;
    $html .= Form::hidden( $input_name . '[]', 'text' );
    $html .= Form::Textarea( $input_name . '[]', $input_value[0], array('rows' => '3', 'class' => 'question form-control', 'title' => $question->guidance ) );
    $html .= $question->append;
    return $html;    
});

/*
|--------------------------------------------------------------------------
| ID 3
| Auswahlbox, einzeilig
|--------------------------------------------------------------------------
*/

Form::macro('question_select', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $question_options = array('' => 'Bitte wählen Sie aus') + QuestionOption::where('question_id','=',$question->id)->lists('text','id');
    $html = '';
    $html .= $question->prepend;
    $html .= Form::hidden( $input_name . '[]', 'option' );
    $html .= Form::select($input_name . '[]', $question_options, $input_value[0], array('class' => 'question form-control', 'title' => $question->guidance ) );
    $html .= $question->append;
    return $html;
});         

/*
|--------------------------------------------------------------------------
| ID 4
| Auswahlbox, mehrzeilig
|--------------------------------------------------------------------------
*/

Form::macro('question_multiselect', function( Question $question, $input_name, Array $input_value = null, $default_value = null  )
{    
    $question_options = array('' => 'Bitte wählen Sie aus') + QuestionOption::where('question_id','=',$question->id)->lists('text','id');
    $html = '';
    $html .= $question->prepend;
    $html .= Form::hidden( $input_name . '[]', 'option' );
    $html .= Form::select($input_name . '[]', $question_options, $input_value, array('class' => 'question form-control','multiple','size' => '5', 'title' => $question->guidance));
    $html .= $question->append;
    return $html;
});  

/*
|--------------------------------------------------------------------------
| ID 5
| Liste
|--------------------------------------------------------------------------
*/

Form::macro('question_list', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{   
    $html = '';
    /*
    $list_string_value = '';
    if( count( $input_value ) > 0 )
    {
        foreach( $input_value as $text )
        {
            $list_string_value .= $text . ',';
        }
    }
    */
    //$list_string_value
    $list_string_value = '';
    if( count( $input_value ) > 0 )
    {
        $list_string_value = implode(',', $input_value);
    }
    
    
    $html .= $question->prepend;
    $html .= '<div class="tagsinput">';
        $html .= Form::hidden( $input_name . '[]', 'list' );
        $html .= Form::Text( $input_name . '[]', $list_string_value, array('class' => 'tags form-control', 'data-role' => 'tagsinput', 'title' => $question->guidance ) );
    $html .= '</div>';
    $html .= $question->append;
    return $html;    
});

/*
|--------------------------------------------------------------------------
| ID 6
| Checkboxen
|--------------------------------------------------------------------------
*/

Form::macro('question_checkboxes', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $question_options = QuestionOption::where('question_id','=',$question->id)->lists('text','id');
    $html = '';    
    $html .= $question->prepend;
    
    foreach( $question_options as $option_value => $option_label  )
    {
        $checked = false;
        if( count( $input_value ) > 0 && in_array( $option_value, $input_value ) )
        {
            $checked = true;
        }
        else
        {                 
            if( !is_null( $default_value ) && $option_value == $default_value )
            {
                $checked = true;
            }
        }
        
        $html .= '<div class="checkbox">';
        $html .= '<label>';
        $html .= Form::hidden( $input_name . '[]', 'option' );        
        $html .= Form::checkbox( $input_name . '[]', $option_value, $checked, array('class' => 'question-checkbox', 'autocomplete' => 'off', 'title' => $question->guidance ) );        
        $html .= $option_label;
        $html .= '</label>';
        $html .= '</div>';
    }    
    
    $html .= $question->append;
    
    return $html;    
});

/*
|--------------------------------------------------------------------------
| ID 7
| Radiobuttons
|--------------------------------------------------------------------------
*/

Form::macro('question_radiobuttons', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $question_options = QuestionOption::where('question_id', '=', $question->id)->lists('text','id');    
    $html = '';
    $html .= $question->prepend;
    
    foreach( $question_options as $option_value => $option_label  )
    {
        $checked = false;
        
        if( count( $input_value ) > 0 && in_array( $option_value, $input_value ) )
        {
            $checked = true;
        }
        
        if( count( $input_value ) == 0 )
        {
            // check a default value
            if( !is_null( $default_value ) && $option_value == $default_value )
            {
                $checked = true;
            }
        }
        
        $html .= '<div class="radio">';
            $html .= '<label>';
            $html .= Form::hidden( $input_name . '[]', 'option' );        
            $html .= Form::radio( $input_name . '[]', $option_value, $checked, array('class' => 'question-radio', 'autocomplete' => 'off', 'title' => $question->guidance ) );        
            $html .= $option_label;
            if( $option_value == $default_value )
            {
                $html .= ' ( Standardauswahl )';
            }
            $html .= '</label>';
        $html .= '</div>';
    }
    $html .= $question->append;    
    return $html;
}); 

/*
|--------------------------------------------------------------------------
| ID 8
| Datumsfeld
|--------------------------------------------------------------------------
*/

Form::macro('question_date', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $html = '';
    $html .= $question->prepend;
    $html .= Form::hidden( $input_name . '[]', 'text' );    
    $html .= Form::Text( $input_name . '[]', $input_value[0], array('class' => 'question question-date form-control', 'title' => $question->guidance ) );
    $html .= $question->append;
    return $html;
});

/*
|--------------------------------------------------------------------------
| ID 9
| Datumsbereich
|--------------------------------------------------------------------------
*/

Form::macro('question_daterange', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    if( count( $input_value ) > 0 )
    {
        $date_from = $input_value[0];
        $date_to = $input_value[1];                        
    }
    else
    {
        $date_from = null;
        $date_to = null;                                                
    }
    
    $html = '';
    $html .= $question->prepend;
    $html .= Form::hidden( $input_name . '[]', 'range' );
    $html .= Form::Text( $input_name . '[]', $date_from, array('class' => 'question question-daterange form-control', 'title' => $question->guidance ) );
    $html .= ' - ';
    $html .= Form::Text( $input_name . '[]', $date_to, array('class' => 'question question-daterange form-control', 'title' => $question->guidance ) );
    $html .= $question->append;
    return $html;
});

/*
|--------------------------------------------------------------------------
| ID 10
| Wertefeld
|--------------------------------------------------------------------------
*/

Form::macro('question_value', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $param_array = explode('|',$question->value);
    
    $html = '';
    $html .= $question->prepend;
    $html .= '&nbsp;&nbsp;';    
    $html .= Form::hidden( $input_name . '[]', 'text' );    
    $html .= Form::Text( $input_name . '[]', $input_value[0], array('class' => 'slider question', 'data-slider-min' => $param_array[0], 'data-slider-max' => $param_array[1], 'data-slider-step' => $param_array[2], 'data-slider-value' => $input_value[0], 'title' => $question->guidance ) );
    $html .= '&nbsp;&nbsp;';
    $html .= '<span class="slider-value">' . $input_value[0] . '</span>';
    $html .= '&nbsp;&nbsp;';
    $html .= $question->append;
    return $html;   
});


/*
|--------------------------------------------------------------------------
| ID 11
| Wertebereich
|--------------------------------------------------------------------------
*/

Form::macro('question_valuerange', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{    
    $param_array = explode('|',$question->value);

    if( count( $input_value ) > 0 )
    {
        $alpha = $input_value[0];
        $omega = $input_value[1];
        $alpha_omega = $alpha . ',' . $omega;
    }
    else
    {
        $alpha = null;
        $omega = null;
        $alpha_omega = '0,0';
    }
    
    

    $html = '';
    $html .= $question->prepend;
    $html .= '&nbsp;&nbsp;';    
    $html .= Form::hidden( $input_name . '[]', 'range' );    
    $html .= Form::Text( $input_name . '-slider-range', null, array('class' => 'slider-range question', 'data-slider-min' => $param_array[0], 'data-slider-max' => $param_array[1], 'data-slider-step' => $param_array[2], 'data-slider-value' => '[' . $alpha_omega . ']', 'title' => $question->guidance ) );  
    $html .= '&nbsp;&nbsp;';
    $html .= Form::hidden( $input_name . '[]', $alpha, array('class' => 'slider-range-input-alpha') ); 
    $html .= Form::hidden( $input_name . '[]', $omega, array('class' => 'slider-range-input-omega') ); 
    $html .= '<span class="slider-range-display-alpha">' . $alpha . '</span>';
    $html .= ' - ';
    $html .= '<span class="slider-range-display-omega">' . $omega . '</span>'; 
    
    
    
    /*
    
    $html = '';
    $html .= $question->prepend;
    $html .= '&nbsp;&nbsp;';
    $html .= Form::hidden( $input_name . '[]', 'range' );
    $html .= Form::Text( $input_name . '[]', $value_from, array('class' => 'question', 'data-slider-min' => $param_array[0], 'data-slider-max' => $param_array[1], 'data-slider-step' => $param_array[2], 'data-slider-value' => '[' . $value_from . ',' . $value_to . ']' ) );
    $html .= ' - ';
    $html .= Form::Text( $input_name . '[]', $value_to, array('class' => 'question', 'data-slider-min' => $param_array[0], 'data-slider-max' => $param_array[1], 'data-slider-step' => $param_array[2], 'data-slider-value' => '[' . $value_from . ',' . $value_to . ']' ) );
     */
    
    //$html .= '<input id="ex1" data-slider-id="ex1Slider" type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>';
    //$html .= '<div class="slider-horizontal question-value-slider" data-slider-min="0" data-slider-max="1000" data-slider-step="20" rel="' . $input_name . '">';
    //$html .= '</div>';    
    //$html .= Form::Text( $input_name, $input_value, array('class' => 'question slider-horizontal question-valuerange-slider', 'data-slider-min' => $param_array[0], 'data-slider-max' => $param_array[1], 'data-slider-step' => $param_array[2], 'data-slider-value' => '[' . $value_from . ',' . $value_to . ']' ) );
    //$html .= Form::Text( $input_name, $input_value, array('class' => 'question form-control', 'data-slider-min' => $param_array[0], 'data-slider-max' => $param_array[1], 'data-slider-step' => $param_array[2], 'data-slider-value' => '[' . $value_from . ',' . $value_to . ']' ) );    
    $html .= '&nbsp;&nbsp;';
    $html .= $question->append;
    return $html;
});

/*
|--------------------------------------------------------------------------
| ID 12
| Ja/Nein
|--------------------------------------------------------------------------
*/

Form::macro('question_boolean', function( Question $question, $input_name, Array $input_value = null, $default_value = null )
{
    $question_options = QuestionOption::where('question_id', '=', $question->id)->lists('text','id');    
    $html = '';
    $html .= $question->prepend;
    
    foreach( $question_options as $option_value => $option_label  )
    {
        $checked = false;
        
        if( count( $input_value ) > 0 && in_array( $option_value, $input_value ) )
        {
            $checked = true;
        }
        
        if( count( $input_value ) == 0 )
        {
            // check a default value
            if( !is_null( $default_value ) && $option_value == $default_value )
            {
                $checked = true;
            }
        }
        
        $html .= '<div class="radio">';
        $html .= '<label>';
        $html .= Form::hidden( $input_name . '[]', 'option' );
        $html .= Form::radio( $input_name . '[]', $option_value, $checked, array('class' => 'question-radio', 'autocomplete' => 'off', 'title' => $question->guidance ) );        
        $html .= $option_label;
        if( $option_value == $default_value )
        {
            $html .= ' ( Standardauswahl )';
        }
        
        $html .= '</label>';
        $html .= '</div>';
    }    
    
    $html .= $question->append;    
    return $html;
}); 