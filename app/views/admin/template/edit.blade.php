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
    <h3>Template {{ $template->name }}</h3>
@stop

@section('title')
    {{ $template->name }}
@stop

@section('body')
    
    @foreach( $sections as $section )
        {{ Form::model($section, array('route' => array('edit_plan', $section->template_id), 'class' => 'form-inline')) }}
            {{ Form::Text( 'section_order', $section->order, array('class' => 'form-control col-md-1') ); }}        
            {{ Form::Text( 'section_keynumber', $section->keynumber, array('class' => 'form-control col-md-1') ); }}
            {{ Form::Text( 'section_name', $section->name, array('class' => 'form-control col-md-8') ); }}
            {{ Form::submit('Update', array('class' => 'button btn btn-success col-md-2')) }}
        {{ Form::close() }}
    @endforeach
@stop