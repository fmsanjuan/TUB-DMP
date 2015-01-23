@extends('layouts.bootstrap')

@section('body')

    <div class="container row">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Login
                </div>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'login', 'class' => 'form-horizontal', 'method' => 'post')) }}                
                        <div class="row">
                            <div class="form-group">
                                {{ Form::label('username', 'Ihr Benutzername', array('class' => 'control-label col-md-5')) }}
                                <div class="col-md-7">
                                    {{ Form::text('username', '', array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                {{ Form::label('password', 'Ihr Passwort', array('class' => 'control-label col-md-5')) }}
                                <div class="col-md-7">
                                    {{ Form::password('password', array('class' => 'form-control')) }}
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-offset-5 col-md-7">
                                    {{ Form::submit('Anmelden', array('class' => 'btn btn-primary' )) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@stop