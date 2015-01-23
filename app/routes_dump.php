<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'uses' => 'HomeController@index',
    'as' => 'home'
));

// route the post from login form to action authenticate
Route::post('/login', array(
    'uses' => 'UserController@validateLogin',
    'as' => 'login'
));
 
// Logout route, only show, when user is logged in
Route::get('/logout', array(
    'uses' => 'UserController@logoutUser',
    'as' => 'logout'
));

Route::get('/my/dashboard', array(
    'uses' => 'DashboardController@index',
    'as' => 'dashboard'
));

/* 1a) GET-Plan-Edit mit Closure ohne Parameter => blockiert 1c) */
/*
Route::get('plan/edit', function() {
    return 'GET Plan Edit';
});
*/

/* 1b) GET-Plan-Edit mit Closure mit Parameter */
/*
Route::get('plan/{project_number}/edit', function($project_number)
{
    return 'GET Plan Edit ' . $project_number;
});
*/

/* 1c) GET-Plan-Edit mit Closure mit optionalem Parameter */
/*
Route::get('plan/{project_number?}/edit', function($project_number = 121)
{
    return 'GET Plan Edit ' . $project_number;
});
*/

/* 2a) GET-Plan-Edit mit Controller ohne Parameter => blockiert 2c) */
//Route::get('plan/edit', 'PlanController@foo');

/* 2b) GET-Plan-Edit mit Controller mit Parameter */
//Route::get('plan/{$project_number}/edit', 'PlanController@foo');

/* 2c) GET-Plan-Edit mit Controller mit optionalem Parameter */
//Route::get('plan/{$project_number?}/edit', 'PlanController@foo');

//Route::resource('plan', 'PlanController');

Route::get('plan/{$project_number}/show', function($project_number) {
    return 'show';
});

Route::get('plan/{$project_number}/edit', function($project_number) {
    return 'edit';
});

Route::get('plan/{$project_number}/export', function($project_number) {
    return 'export';
});

/*
Route::get('/plan/edit/{project_number}', 'PlanController@edit');

Route::post('/plan/edit', array(
    'uses' => 'PlanController@edit',
    'as' => 'edit_plan'
));

Route::get('/plan/show', array(
    'uses' => 'PlanController@show',
    'as' => 'show_plan'
));


Route::post('/plan/new', array(
    'uses' => 'PlanController@create',
    'as' => 'create_plan'
));



Route::get('basicauth', array('before' => 'auth.basic', function()
{
    return 'Logged in!';
}));


Route::get('pdf', function()
{
    $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->show();
});

Route::get('pdf/download', function()
{
    $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->download('my_pdf');
});
*/


/*
Route::get('/', function()
{
	// return View::make('hello');
	return View::make('home');
});
*/