@extends('layouts.bootstrap')

@section('navigation')
    <li>{{ link_to_route( 'dashboard', 'Zurück' ) }}</li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Datenmanagementplan <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>{{ link_to_route( 'edit_plan', 'Bearbeiten', $plan->project_number ) }}</li>
            <li>{{ link_to_route( 'show_plan', 'Kontrollieren', $plan->project_number ) }}</li>
            <li>{{ link_to_route( 'export_plan', 'Nachnutzen', $plan->project_number, array('class' => 'current') ) }}</li>                                                              
        </ul>
    </li>
@stop

@section('headline')
    <h1>Projekt {{ $plan->project_number }}</h1>
@stop

@section('title')
    {{ $plan->title }}
@stop


@section('body')
    <div class="row text-center">
        <div class="col-md-3">
            <ul>
                <li>{{ link_to_route( 'get_plan_as_pdf', 'Als PDF anzeigen', $plan->project_number ) }}</li>
                <li>{{ link_to_route( 'get_plan_as_pdf', 'Als PDF herunterladen', array( 'project_number' => $plan->project_number, 'download' => 1 ) ) }}</li> 
                <li>{{ link_to_route( 'get_plan_as_xml', 'Als XML anzeigen', array( 'project_number' => $plan->project_number ) ) }}</li>
                <li>{{ link_to_route( 'email_plan_as_pdf', 'PDF als E-Mail versenden', array( 'project_number' => $plan->project_number ) ) }}</li>
            </ul>
        </div>
        <div class="col-md-3">
            <button class="btn btn-success">Dateneingabe abschließen</button>
        </div>
    </div>
@stop