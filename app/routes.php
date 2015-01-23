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


// HOMEPAGE
Route::get('/', array(
    'before' => 'logged_in',
    'uses' => 'HomeController@index',
    'as' => 'home'
));
 
// HOMEPAGE WHEN LOGGED IN
Route::get('/my/dashboard', array(
    'uses' => 'DashboardController@index',
    'as' => 'dashboard'
));




// CREATE PLAN
Route::post('/plan/new', array(
    'uses' => 'PlanController@create',
    'as' => 'create_plan'
));

// SHOW PLAN
Route::get('/plan/{project_number}/show', array(
    'uses' => 'PlanController@show',
    'as' => 'show_plan'
));

// EDIT PLAN
Route::get('/plan/{project_number}/edit', array(
    'uses' => 'PlanController@edit',
    'as' => 'edit_plan'
));

// SAVE PLAN
Route::post('/plan/save', array(
    'uses' => 'PlanController@saveAjaxPlan',
    'as' => 'save_plan'
));

// EXPORT PLAN
Route::get('/plan/{project_number}/export', array(
    'uses' => 'PlanController@export',
    'as' => 'export_plan'
));

// EXPORT PLAN AS PDF
Route::get('/plan/{project_number}/pdf', array(
    'uses' => 'PlanController@getPDF',
    'as' => 'get_plan_as_pdf'
));

// EXPORT PLAN AS XML
Route::get('/plan/{project_number}/xml', array(
    'uses' => 'PlanController@getXML',
    'as' => 'get_plan_as_xml'
));

// EXPORT PLAN AS EMAIL
Route::get('/plan/{project_number}/email', array(
    'uses' => 'PlanController@emailPDF',
    'as' => 'email_plan_as_pdf'
));




// LOGIN FORM
Route::get('/login/{auth_source}', array(
    'uses' => 'UserController@index'
));

// LOGIN VIA DB
Route::post('/login/db', array(
    'uses' => 'UserController@loginUser',
    'as' => 'login',
))->where(array('foo' => 'bar'));

// LOGOUT VIA DB
Route::get('/logout', array(
    'uses' => 'UserController@logoutUser',
    'as' => 'logout'
));





// ADMIN INDEX
Route::get('/admin', array(
    'uses' => 'AdminController@index',
    'as' => 'admin'
));

// TEMPLATE ADMIN 
Route::get('/admin/template/{template_id}/edit', array(
    'uses' => 'TemplateController@editTemplate',
    'as' => 'edit_template'
));






/*
Route::post('/plan/quick_save', array(
    'uses' => 'PlanController@savePlan',
    'as' => 'quick_save_plan'
));
*/

/*
Route::get('/shibblogin', array(
    'uses' => 'UserController@shibbLogin'
));
*/
