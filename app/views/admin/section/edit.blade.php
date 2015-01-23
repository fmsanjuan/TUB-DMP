@extends('layouts.bootstrap')

@section('navigation')
    <li>{{ link_to_route( 'dashboard', 'Zurück' ) }}</li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Datenmanagementplan <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to_route( 'admin', 'Zurück zur Übersicht' ) }}</li>                                                             
        </ul>
    </li>
@stop

@section('headline')
    <h3>Section {{ $section->name }} in Template {{ $section->template->title }}</h3>
@stop

@section('title')
    {{ $section->name }}
@stop

@section('body')

            <div class="row">
                <div class="col-md-12">
                    
                    {{ Form::model($section, array('route' => 'section.edit', $section->id), array('class' => 'form-inline')) }}	

                        {{ Form::label('keynumber', 'Keynumber', array( 'class' => 'control-label col-md-3' )) }}
                        {{ Form::email('keynumber', null, array( 'class' => 'form-control col-md-9' )) }}	                    
                    
                        {{ Form::label('name', 'Name', array( 'class' => 'control-label' )) }}
                        {{ Form::text('name', null, array( 'class' => 'form-control' )) }}

                        {{ Form::submit('Update', array('class' => 'button btn btn-success')) }}

                    {{ Form::close() }}
                    
                </div>
            </div>
        
@stop