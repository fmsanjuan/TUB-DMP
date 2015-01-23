@extends('layouts.bootstrap')

@section('navigation')
    <li>{{ link_to_route( 'dashboard', 'Übersicht' ) }}</li>
@stop

@section('headline')
    <h1>Admin: Datenmanagementpläne</h1>
@stop

@section('body')

    <div class="container row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Vorhandenes Template laden
            	</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($templates as $template)                            
                            <li class="list-group-item row">
                                <div class="col-md-3">
                                    <?php
                                     $logo_path = 'images/logo/' . $template->institution->logo;
                                    ?>
                                    <img src="{{ asset( $logo_path ) }}">
                                </div>
                                <div class="col-md-9">                                    
                                    {{ link_to('admin/template/' . $template->id . '/edit', $template->name) }}                                    
                                    <br/>
                                    <small>
                                        Institution: {{ $template->institution->name }}
                                        <br/>
                                        Letzte Änderung: {{ $template->updated_at }}                            
                                        ({{ \Carbon\Carbon::createFromTimeStamp(strtotime($template->updated_at))->diffForHumans() }})
                                    </small>                              
                                </div>
                            </li>
                        @endforeach                           
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Neues Template erstellen
            	</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'admin/template/new', 'name' => 'template_new', 'id' => 'template_new', 'class' => 'form-horizontal', 'method' => 'post')) }}
                        <div class="row">
                            <div class="form-group">
                                {{ Form::label('template_name', 'Template-Name', array('class' => 'control-label col-md-5')) }}
                                <div class="col-md-7">
                                    {{ Form::Text('template_name', '', array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-offset-5 col-md-7">
                                    {{ Form::submit('Template generieren', array('class' => 'button btn btn-primary' )) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop