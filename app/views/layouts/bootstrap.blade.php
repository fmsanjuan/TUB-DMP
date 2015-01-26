<!DOCTYPE html>
<html>
    <head>
        <title>DMP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Cache-control" content="no-store">        
        <meta name="Generator" content="Laravel 4.1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        
        <!-- CSS
        ================================================== -->
        {{-- HTML::style('css/vendor/jquery-ui/jquery-ui-1.10.3.custom.min.css'); --}} 
        {{ HTML::style('css/vendor/jquery-ui-blitzer/jquery-ui.min.css'); }} 
        
        {{ HTML::style('css/vendor/bootstrap/bootstrap.ubtub.3.1.1.dark.css'); }}
        {{ HTML::style('css/vendor/bootstrap/dspace-theme.css'); }}
        {{ HTML::style('css/bootstrap.mods.css'); }}
        
        {{ HTML::style('css/style.css'); }}
        
        <!-- jQuery (with fallback)
        ================================================== -->                
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>  
        
        <!-- Bootstrap
        ================================================== -->
        {{ HTML::script('js/vendor/bootstrap/bootstrap.min.js'); }}
        
        
        
        <!-- Misc JS
        ================================================== -->                
        {{-- HTML::script('js/vendor/misc/choice-support.js') --}} 
        {{-- HTML::script('js/vendor/misc/holder.js') --}} 
        {{-- HTML::script('js/vendor/misc/html5shiv.js') --}} 
        {{-- HTML::script('js/vendor/misc/respond.min.js') --}} 
        
        <!-- TagsInput
        ================================================== -->                                                 
        {{ HTML::script('js/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js'); }}
        {{ HTML::style('css/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'); }} 

        <!-- TypeAhead
        ================================================== -->                                                 
        {{ HTML::script('js/vendor/typeahead.js/typeahead.jquery.js'); }}
        
        {{ HTML::script('js/plan.js'); }}            
        
        {{ HTML::script('js/main.js'); }}  
    
        <script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
        </script>
        
    </head>

    <body class="undernavigation">
        <a class="sr-only" href="#content">Skip navigation</a>
        <header class="navbar navbar-inverse navbar-fixed-top">    
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        Navigation
                        <b class="caret"></b>
                    </button>
                </div>

                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        
                        @section('navigation')
                            <li class="active"><a href="{{{ URL::to('') }}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        @show
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Das Projekt<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="">
                                    <script type="text/javascript">
                                        <!-- Javascript starts here
                                        document.write('<a href="#" onClick="var popupwin = window.open(\'/fab-jspui/help/index.html\',\'dspacepopup\',\'height=600,width=550,resizable,scrollbars\');popupwin.focus();return false;">Hilfe<\/a>');
                                        // -->
                                    </script>
                                    <noscript><a href="/fab-jspui/help/index.html" target="dspacepopup">Hilfe</a></noscript>
                                </li>
                                <li>
                                    <a href="#">Feedback / Kontakt</a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header"><strong>Projektinformation</strong></li>
                                <li><a href="http://www.szf.tu-berlin.de/menue/dienste_tools/datenmanagementplan/" target=_blank"">SZF Webseite</a></li>                           
                                
                            </ul>
                        </li>
                    </ul>
                    
                    <?php //var_dump( Session::all() ); ?>
                    
                    <div class="nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span>
                                    @if( Auth::check() )                                        
                                        {{ Auth::user()->username}}
                                    @else
                                        Einloggen via:
                                    @endif
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    @if( Auth::check() )                              
                                        <!--
                                        <li>
                                            <a href="/dmp/logout" class="dropdown-toggle" data-toggle="dropdown">
                                                <span class="glyphicon glyphicon-log-out"></span> Logout
                                            </a>
                                        </li>
                                        -->
                                        <li>{{ link_to('/logout', 'Logout'); }}</li>
                                    @else                                        
                                        <li>{{ link_to('/login/db', 'Database'); }}</li>
                                        <li>{{ link_to('/shibblogin', 'Shibboleth'); }}</li>                                  
                                    @endif
                                </ul>
                            </li>
                        </ul>
                        <div style="display: none;">
                            @section('session')                    
                                @if( Auth::check() )
                                    {{ SiteHelpers::getUserSessionData( Auth::user()->id ) }}
                                @endif
                            @show    
                        </div>                        
                    </div>
                </nav>
            </div>
        </header>
        
        <main id="content" role="main">
            
            <div class="container banner">

                <div class="row">
                    <div class="col-md-1">
                        <img class="pull-left" id="logo-tu" src="{{ asset('images/logo-tu-small.png') }}" alt="Logo TU Berlin" title="Logo TU Berlin">
                    </div>
                    <div class="col-md-8 header">
                        <h1>TUB-DMP</h1>                        
                        @section('headline')
                            <!--<h1>Willkommen!</h1>-->
                            <p>
                                Der Datenmanagementplan ist ein Instrument für eine strukturierte Projektbeschreibung.
                                Hier können Sie Informationen zum Projekt selbst und zum Kontext der Entstehung Ihrer Forschungsergebnisse ablegen.
                                <br/><a href="http://www.szf.tu-berlin.de/menue/dienste_tools/datenmanagementplan/" target="_blank"><button class="btn btn-primary">Learn More</button></a>                            
                            </p>
                        @show                    
                    </div>
                    <div class="col-md-3">
                        <small>v0.9.9</small><img class="pull-right" id="logo-dmp" src="{{ asset('images/logo-dmp-small.png') }}" alt="Logo TUB-DMP" title="Logo TUB-DMP">
                        
                    </div>
                </div>
                
                
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        @yield('body')
                        
                    </div>
                </div>
            </div>
        </main>
            
        <footer class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container text-center">
                &copy; {{ date("Y") }} SZF - Ein Dienst der Universitätsbibliothek der TU Berlin
            </div>
            
        </footer>
    
        @section('notifications')
            
            @if( !Request::ajax() )
        
                @if ( Session::has('flash_general_error') )
                    <span id="flash" rel="general_error" data="{{  Session::get('flash_general_error') }}" />
                    <?php Session::forget('flash_general_error'); ?>
                @endif

                @if ( Session::has('flash_error') )
                    <span id="flash" rel="error" data="{{  Session::get('flash_error') }}" />
                    <?php Session::forget('flash_error'); ?>
                @endif

                @if ( Session::has('flash_success') )
                    <span id="flash" rel="success" data="{{  Session::get('flash_success') }}" />
                    <?php Session::forget('flash_success'); ?>
                @endif
            
            @endif
                
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!--<div class="modal-header"></div>-->
                        <div class="modal-body"></div>
                        <!--<div class="modal-footer"></div>-->
                    </div>
                </div>
            </div>            
                            
       @show                
    
        <!-- jQuery UI
        FIXME
        ================================================== -->                        
        {{-- HTML::script('js/vendor/jquery-ui-1.10.3.custom.min.js'); --}} 
        {{ HTML::script('js/vendor/jquery-ui/jquery-ui.min.js'); }} 
       
       <!-- Bootstrap Slider
            https://github.com/seiyria/bootstrap-slider
        ================================================== -->
       {{ HTML::script('js/vendor/bootstrap-slider/bootstrap-slider.seiyria.js'); }}
       {{ HTML::style('css/vendor/bootstrap-slider/bootstrap-slider.seiyria.css'); }}

       <!-- Bootstrap Progressbar
            https://github.com/minddust/bootstrap-progressbar
        ================================================== -->
       {{ HTML::script('js/vendor/bootstrap-progressbar/bootstrap-progressbar.js'); }}
       {{ HTML::style('css/vendor/bootstrap-progressbar/bootstrap-progressbar-3.1.1.css'); }}
       
        <!-- jGrowl
        FIXME
        ================================================== -->                
       {{-- HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.2.12/jquery.jgrowl.js'); --}}
       {{-- HTML::script('js/vendor/jquery.jgrowl.js'); --}}               
       {{-- HTML::style('css/vendor/jquery.jgrowl.css'); --}}       
       
        <!-- Gritter
        FIXME
        ================================================== -->                
       {{-- HTML::script('js/vendor/jquery.gritter.js'); --}}        
       {{-- HTML::style('//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.2.12/jquery.jgrowl.css'); --}}
       {{-- HTML::style('css/vendor/jquery.gritter.css'); --}}        

        <!-- Facebox
        FIXME
        ================================================== -->                
        {{ HTML::script('js/vendor/jquery.facebox.js'); }}
        {{ HTML::style('css/vendor/jquery.facebox.css'); }}        

        <!-- DirtyForms
        FIXME
        ================================================== -->                                     
        {{ HTML::script('js/vendor/jquery.dirtyforms.js'); }}         
        
        {{ HTML::script('js/plugins.js'); }}    
    
    </body>
</html>