@extends('layouts.bootstrap')

@section('navigation')
    <li>{{ link_to_route( 'dashboard', 'Übersicht' ) }}</li>
@stop

@section('headline')
    <h1>Ihre Datenmanagementpläne</h1>
@stop

@section('body')

    <div class="container row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Vorhandenen Plan laden
            	</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($plans as $plan)
                            <li class="list-group-item">
                                <span class="plan-list-logo col-md-3">
                                    {{ HTML::image( asset('images/logo/' . $plan->template->institution->logo) , "Logo", array( 'class' => 'col-md-10', 'style' => 'margin-bottom: 15px;' )) }}                                      
                                </span>
                                <span class="badge">
                                    {{ $plan->project_number }}
                                </span>
                                <a href="#">
                                    {{ link_to('plan/' . $plan->project_number . '/edit', $plan->template->name); }}
                                    <br/>
                                    <small>
                                        Letzte Änderung: {{ $plan->updated_at }}                            
                                        {{-- \Carbon\Carbon::createFromTimeStamp(strtotime($plan->updated_at))->diffForHumans() --}}
                                    </small>                           
                                </a>
                            </li>
                        @endforeach                           
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Neuen Plan erstellen
            	</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'plan/new', 'name' => 'plan_new', 'id' => 'plan_new', 'class' => 'form-horizontal', 'method' => 'post')) }}
                        <div class="row">
                            <div class="form-group">
                                {{ Form::label('project_number', 'Ihre Projektnummer', array('class' => 'control-label col-md-5')) }}
                                <div class="col-md-7">
                                    {{ Form::text('project_number', '', array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {{ Form::label('plan_template', 'Vorlage', array('class' => 'control-label col-md-5')) }} 
                                <div class="col-md-7">
                                    {{ Form::select('plan_template', $template_selector, 'TU Berlin Standard', array('class' => 'form-control') ) }}
                                </div>                                
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-offset-5 col-md-7">
                                    {{ Form::submit('Plan generieren', array('class' => 'button btn btn-primary' )) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop