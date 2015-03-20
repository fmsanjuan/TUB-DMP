@extends('layouts.bootstrap')

@section('navigation')
    <li>{{ link_to_route( 'dashboard', 'Zurück' ) }}</li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Datenmanagementplan <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to_route( 'edit_plan', 'Bearbeiten', $plan->project_number, array('class' => 'current') ) }}</li>
            <li>{{ link_to_route( 'show_plan', 'Kontrollieren', $plan->project_number ) }}</li>
            <li>{{ link_to_route( 'export_plan', 'Nachnutzen', $plan->project_number ) }}</li>                                                              
        </ul>
    </li>
@stop

@section('headline')
    <h3>Datenmanagementplan für Projekt {{ $plan->project_number }}</h3>
    <br/>Vorlage: {{ $plan->template->name }}
@stop

@section('title')
    {{ $plan->title }}
@stop

@section('body')
    
    <p>
        {{ $question_count }} Questions.<br/>
        {{ $answer_count }} Answers ({{ $question_answer_percentage }} % beantwortet)<br/>
        <div class="progress">
            <div class="progress-bar" role="progressbar" data-transitiongoal="{{ $question_answer_percentage }}"></div>
        </div>
    </p>

    {{ Form::open(array('route' => 'save_plan', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'save_plan')) }}
        {{ Form::hidden( 'project_number', $plan->project_number) }}

        @foreach( $sections as $section )        
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading section-header">
                            <a name="{{ $section->keynumber }}"></a>{{ $section->keynumber }}. {{ $section->name }}
                            <a href="#" class="section-toggler closed">Details</a>
                        </div>
                        <div class="panel-body section-form">
                            @foreach( $questions as $question )                                
                                @if( $question->section_id == $section->id )                                
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="{{$question->id}}" class="control-label col-md-5">
                                                <span class="question-text">
                                                    {{ $section->keynumber }}.{{ $question->keynumber }}
                                                    {{ $question->text }}
                                                </span>
                                                
                                                @if( $question->reference )
                                                    <br/><span class="reference">{{ $question->reference }}</span>
                                                @endif
                                                @if( $question->comment )
                                                    <br/>
                                                    <span class="comment">
                                                        {{ $question->comment }}
                                                    </span>                        
                                                @endif
                                            </label>
                                            <span class="col-md-7">
                                                {{-- $question->id --}}
                                                {{ Form::macro_test( $question, $plan ) }}
                                            </span>    
                                        </div>                                        
                                    </div>
                                    @if( $question->guidance )
                                        <div class="guidance">{{ $question->guidance }}</div>                        
                                    @endif
                                    <?php
                                    $child_questions = Question::hasChildQuestions( $question );
                                    ?>
                                    @foreach( $child_questions as $child_question )
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="{{$child_question->id}}" class="control-label col-md-5">
                                                    <span class="child-question-text">                                                        
                                                        &rarr; {{ $child_question->text }}
                                                    </span>
                                                    @if( $child_question->guidance )
                                                        <br/><span class="guidance">{{ $child_question->guidance }}</span>                        
                                                    @endif
                                                    @if( $child_question->reference )
                                                        <br/><span class="reference">{{ $child_question->reference }}</span>
                                                    @endif
                                                    @if( $child_question->comment )
                                                        <br/>
                                                        <span class="comment">
                                                            {{ $child_question->comment }}
                                                        </span>                   
                                                    @endif
                                                </label>
                                                <span class="col-md-7">
                                                    {{ Form::macro_test( $child_question, $plan ) }}
                                                </span>
                                            </div>                                        
                                        </div>                              
                                    @endforeach
                                    
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-md-1 section-status">
                    
                    @if( false )
                        @if( Section::isComplete( $section ) )
                            <span class="glyphicon glyphicon-ok-sign"></span>
                        @else
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                        @endif
                    @endif
                    /*
                    <span class="glyphicon glyphicon-ok-circle complete"></span>
                    <span class="glyphicon glyphicon-exclamation-sign incomplete"></span>
                    */
                </div>
                -->
            </div>
       @endforeach                 
        
        <div class="row">
            <div class="col-md-12 text-center"> 
                {{ Form::submit('Plan speichern', array('class' => 'button big btn btn-success')) }} 
            </div>
        </div>

    {{ Form::close() }}

@stop