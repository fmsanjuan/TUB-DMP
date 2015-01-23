@extends('layouts.bootstrap')

@section('navigation')
    <li>{{ link_to_route( 'dashboard', 'Zurück' ) }}</li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Datenmanagementplan <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to_route( 'edit_plan', 'Bearbeiten', $plan->project_number ) }}</li>
            <li>{{ link_to_route( 'show_plan', 'Kontrollieren', $plan->project_number, array('class' => 'current') ) }}</li>
            <li>{{ link_to_route( 'export_plan', 'Nachnutzen', $plan->project_number ) }}</li>                                                              
        </ul>
    </li>
@stop

@section('headline')
    <h1>Projekt {{ $plan->project_number }}</h1>
@stop

@section('title')
    {{ $plan->name }}
@stop


@section('body')
    <div class="container">

        <ol id="plan-toc">
        @foreach( $sections as $section )            
            <li><a href="#{{$section->keynumber}}">{{ $section->name }}</a></li>
        @endforeach
        </ol>
    </div>

    @foreach( $sections as $section )            
        <div class="section-header">
            <h3><a name="{{ $section->keynumber }}"></a>{{ $section->keynumber }}. {{ $section->name }}</h3>
        </div>
        @foreach( $questions as $question )
            @if( $question->section_id == $section->id )
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <span class="question-text">
                                {{ $section->keynumber }}.{{ $question->keynumber }}                        
                                {{ $question->text }}
                            </span>
                            <br/>
                            <span class="answer-text">
                                <?php
                                $answer = QuestionAnswerRel::getAnswer( $question, $plan, 'html' );
                                if( is_array( $answer ) )
                                {
                                    if( $question->prepend )
                                    {
                                        echo '<span class="answer-prepend">' . $question->prepend . '</span>';
                                    }
                                    
                                    switch( $answer[0] )
                                    {
                                        case 'option':
                                            foreach( $answer as $option_id )
                                            {
                                                $option_data = QuestionOption::getOptionText( $option_id );
                                                if( !is_null($option_data) )
                                                {
                                                    echo '<span class="answer-text">' . $option_data . '</span><br/>';
                                                }
                                            }
                                            break;
                                        case 'range':
                                            for( $i = 1; $i<count($answer); $i++ )
                                            {
                                                if( !is_null($answer[$i]) )
                                                {
                                                    echo $answer[$i];
                                                    if( key($answer) == $i-1 )
                                                    {
                                                        echo ' - ';
                                                    }
                                                }                                            
                                            }
                                            break;
                                            
                                        case 'list':
                                            for( $i = 1; $i<count($answer); $i++ )
                                            {
                                                if( !is_null($answer[$i]) )
                                                {
                                                    echo $answer[$i];
                                                    if( $i < count($answer)-1 )
                                                    {
                                                        echo '<br/>';
                                                    }
                                                }                                            
                                            }
                                            break;
                                            
                                        default:
                                            echo $answer[1];
                                            break;

                                    }
                                    
                                    if( $question->append )
                                    {
                                        echo '<span class="answer-append">' . $question->append . '</span>';
                                    }
                                    
                                }
                                ?>
                            </span>
                        </p>
                    </div>
                </div>
                    
                <?php
                $child_questions = Question::hasChildQuestions( $question );
                ?>
                @foreach( $child_questions as $child_question )
                    <?php
                    $answer = QuestionAnswerRel::getAnswer( $child_question, $plan, 'html' );
                    ?>
                    @if( !is_null( $answer ) )
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <span class="answer-text">
                                        &rarr; 
                                        <?php
                                        if( is_array( $answer ) )
                                        {
                                            switch( $answer[0] )
                                            {
                                                case 'option':
                                                    foreach( $answer as $option_id )
                                                    {
                                                        $option_data = QuestionOption::getOptionText( $option_id );
                                                        if( !is_null($option_data) )
                                                        {
                                                            echo '<span class="answer-text">' . $option_data . '</span><br/>';
                                                        }
                                                    }
                                                    break;
                                                case 'range':
                                                    for( $i = 1; $i<count($answer); $i++ )
                                                    {
                                                        if( !is_null($answer[$i]) )
                                                        {
                                                            echo $answer[$i];
                                                            if( key($answer) == $i-1 )
                                                            {
                                                                echo ' - ';
                                                            }
                                                        }                                            
                                                    }
                                                    break;
                                                default:
                                                    echo $answer[1];
                                                    break;

                                            }
                                        }
                                        ?>
                                        {{ $question->append }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endforeach
@stop