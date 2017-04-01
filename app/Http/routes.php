<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
 * front page routes
 */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/signin',[
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);
/**
 * end
 */


/**
 * admin page routes
 */

/**
 * get admin dashboard
 */
Route::get('/dashboard', [
    'uses' => 'UserController@getAdminDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

/**
 * get doctor register form
 */
Route::get('/regdoctor',  [
    'uses' => 'UserController@getDoctorRegisterForm',
    'as' => 'regdoctor'
    
]);

/**
 * register doctors
 */
Route::post('/regdoctors', [
    'uses' => 'UserController@postRegisterDoctor',
    'as' => 'regdoctors',
]);

/**
 * add specific field for doctors
 */
Route::post('/addfield', [
    'uses' => 'UserController@postAddField',
    'as' => 'addfield',
]);

/**
 * add schedule for doctors
 */
Route::get('/addDoctorShedule', [
    'uses' => 'SearchController@postDoctorEventSheduling',
    'as' => 'addDoctorShedule',
]);


/**
 * manage calandar (create events) in admin pannel
 */

/**
 * api for google calandar
 */
Route::resource('events', 'EventController');

/**
 * display calandar in admin page
 */
Route::get('/admin/calander', function () {
    $data = [
        'page_title' => 'Home',
    ];
    return view('event/index', $data);
});

/**
 * display created events
 */
Route::get('/admin/calendar/event/list',  [
    'uses' => 'EventController@getAdminCalander',
    'as' => 'event/list'

]);

/**
 * get create event page in admin panel
 */
Route::get('/admin/calendar/event/create',  [
    'uses' => 'EventController@getEventCreate',
    'as' => 'event/create'
]);

/**
 * save events in calandar
 */
Route::post('/event/save',[
    'uses' => 'EventController@postStoreEvent',
    'as' => 'event/save'
]);

Route::get('/api', function () {
    $events = DB::table('events')->select('id', 'doctor_id', 'doctor_name', 'start_time as start', 'end_time as end')->get();
    foreach($events as $event)
    {
        $event->title = $event->doctor_name . ' - ' .$event->doctor_id;
        $event->url = url('events/' . $event->id);
    }
    return $events;
});

/**
 * appointment tasks
 */

/**
 * get search results
 */
Route::get('/searchresult', [
    'uses' => 'SearchController@getSearhResults',
    'as' => 'searchresult',
]);

/**
 * take ajax search results
 */
Route::get('/search', [
    'uses' => 'SearchController@postSearch',
    'as' => 'search',
]);



