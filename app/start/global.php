<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

    app_path().'/library',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a rotating log file setup which creates a new file each day.
|
*/

$logFile = 'log-'.php_sapi_name().'.txt';

Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
    /*
    Session::put('exception_url', URL::current());
    
    if( isset(Auth::user()->username) ) {
        $user = Auth::user()->username;
    } else {
        $user = 'Unbekannt';
    }
    
    
    Mail::send('admin.exception_email', array(
        'exception' => $exception,
        'code' => $code,
        'page' => Session::get('exception_url'),
        'user' => $user
    ), function($message) {
        $message->from( 'dmp@dmp.tu-berlin.de', 'DMP-Anwendung' );
        $message->to( 'fabian.fuerste@tu-berlin.de', 'Fabian Fürste' );
        //$message->to( 'dmp@dmp.tu-berlin.de', 'DMP Team' );
        $message->subject( 'DMP-Anwendung: Fehler durch Exception - ' . Session::get('exception_url') );
    });    
    
    $popup_text = '<h3>Oops, da ist etwas schiefgelaufen!</h3><p>Unsere Administratoren wurden informiert.</p>';
    $popup_text .= '<p>Bitte überprüfen Sie auch noch einmal Ihre Eingabe.</p>';
    $popup_text .= '<p>(Fehler-URL: ' . Session::get('exception_url') . ')</p>';
    
    return Redirect::route('home')
        ->with('flash_general_error', $popup_text);
     */
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenace mode is in effect for this application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';
require app_path().'/events.php';
require app_path().'/macros.php';

/*
Auth::extend('shibboleth', function($app) {
    $provider =  new \ShibbolethAuth\ShibbolethAuthUserProvider();
    return new \Illuminate\Auth\Guard($provider, $app['session']);
});
*/

// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);
// include DOMPDF's default configuration
require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';
