<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
                
        <div class="container">
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
            
            <div class="sixteen columns" id="plan-body">            
                
                @yield('body')

            </div>
                
            <div class="sixteen columns">
                @section('footer')
                    &copy; 2013 SZF
                @show
            </div>
            
        </div><!-- container -->        
    </body>
</html>
