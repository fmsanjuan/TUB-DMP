<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DMP</title>
        <meta name="description" content="">

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">        
        
        
        <!-- CSS (HTML5-Boilerplate, Skeleton CSS Framework)
        ================================================== -->
        {{ HTML::style('css/vendor/html5-boilerplate/normalize.min.css'); }}
        {{ HTML::style('css/vendor/html5-boilerplate/main.css'); }}
        {{ HTML::style('css/vendor/skeleton/base.css'); }}
        {{ HTML::style('css/vendor/skeleton/skeleton.css'); }}
        
        {{-- HTML::style('css/vendor/skeletoast/skeletoast.css'); --}}
        {{ HTML::style('css/vendor/skeleton/layout.css'); }}
        {{ HTML::style('css/vendor/jquery-ui/jquery-ui-1.10.3.custom.min.css'); }}        

        <!-- My Styles
        ================================================== -->        
        {{ HTML::style('css/style.css'); }}        
                
        <!-- Modernizr
        ================================================== -->
        {{ HTML::script('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); }}

        <!-- jQuery (with fallback)
        ================================================== -->                
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>        

        <!-- TagsInput
        ================================================== -->                                                 
        {{-- HTML::script('js/vendor/jquery.tagsinput.js'); --}}
        {{ HTML::script('js/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js'); }}
        {{ HTML::style('css/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'); }}          
        
        {{ HTML::script('js/plan.js'); }}            
        {{ HTML::script('js/main.js'); }}        
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
                
        <div class="container" id="top">
            
            <div class="two columns">
                <img id="logo-tu" src="{{ asset('images/logo-tu.png') }}" alt="Logo TU" title="Logo TU">
            </div>
            <div class="eight columns" id="page-title">
                <h1 class="remove-bottom">
                    Datenmanagementplan
                </h1>
                0.9.9<br/>
                Ein Dienst des Servicezentrums Forschungsdaten und -publikationen
                {{-- Route::currentRouteName() --}}
                {{-- Route::currentRouteAction() --}}
                {{-- var_dump(Input::all()) --}}                
            </div>
            <div class="two columns">
                <img id="logo-tu" src="{{ asset('images/logo-szf.png') }}" alt="Logo SZF" title="Logo SZF">
            </div>
            <div class="four columns">
                @section('session')                    
                    @if( Auth::check() )
                        {{ SiteHelpers::getUserSessionData( Auth::user()->id ) }}
                    @endif
                    <br/>
                    <span style="color: #C50E1F; font-weight: bold;">Ihre Meinung ist uns wichtig!</span>
                    <br/>
                    <input id="feedback-button" class="button" type="button" value="Feedback" />
                @show
                
                @section('notifications')
                
                    @if (Session::has('flash_general_error'))
                        <span id="flash" rel="general_error" data="{{ Session::get('flash_general_error') }}" />
                    @endif
                
                    @if (Session::has('flash_error'))
                        <span id="flash" rel="error" data="{{ Session::get('flash_error') }}" />
                    @endif

                    @if (Session::has('flash_success'))
                        <span id="flash" rel="success" data="{{ Session::get('flash_success') }}" />
                    @endif
                @show                
                
                    @if(Session::has('flash_success'))
                        <span id="flash" rel="success" data="{{ Session::get('flash_success') }}" />
                    @endif
                    
                    @if(isset($flash_success))
                        <span id="flash" rel="success" data="{{ $flash_success }}" />
                    @endif
            </div>
            
            <div class="sixteen columns">
                <ul class="nav">
                    @section('navigation')
                        <li><a href="{{{ URL::to('') }}}">Home</a></li>
                    @show
                </ul>
            </div>

            @if( true == false ) 
                <div class="sixteen columns">
                    @section('title')
                    @show
                </div>
            @endif
            
            <div class="sixteen columns" id="plan-header">
                <h2>
                    @section('headline')
                        Willkommen!
                    @show
                </h2>
            </div>

            <div class="sixteen columns" id="plan-body">            
            
                @yield('body')

            </div>
                
            <div class="sixteen columns">
                @section('footer')
                    &copy; 2013 SZF 
                @show
            </div>
            
        </div><!-- container -->        

        <!-- jQuery UI
        ================================================== -->                        
        {{ HTML::script('js/vendor/jquery-ui-1.10.3.custom.min.js'); }} 

        <!-- jGrowl
        ================================================== -->                
       {{-- HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.2.12/jquery.jgrowl.js'); --}}
       {{ HTML::script('js/vendor/jquery.jgrowl.js'); }}               
       {{ HTML::style('css/vendor/jquery.jgrowl.css'); }}    

        <!-- Gritter
        ================================================== -->                
       {{-- HTML::script('js/vendor/jquery.gritter.js'); --}}        
       {{-- HTML::style('//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.2.12/jquery.jgrowl.css'); --}}
       {{-- HTML::style('css/vendor/jquery.gritter.css'); --}}        

        <!-- Facebox
        ================================================== -->                
        {{ HTML::script('js/vendor/jquery.facebox.js'); }}
        {{ HTML::style('css/vendor/jquery.facebox.css'); }}        

        <!-- DirtyForms
        ================================================== -->                                     
        {{ HTML::script('js/vendor/jquery.dirtyforms.js'); }}         
        
        {{ HTML::script('js/plugins.js'); }}        
        
    </body>
</html>
