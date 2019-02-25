<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	    return view('welcome');
	});

Route::group(['middleware'=>['auth'],'prefix'=>'admin','namespace' => 'Admin',], function(){ 

	Route::get('/', function () {
	    return view('index');
	})->name('dashboard');

	Route::resource('dashboard','DashboardController');
	Route::get('orange','DashboardController@orange')->name('orange');
	Route::get('jstask2','DashboardController@jstask2')->name('jstask2');
	Route::resource('users','UsersController');
	Route::post('userlogout','UsersController@logout')->name('userlogout');
	Route::resource('projects','ProjectsController');
	Route::resource('industries','IndustriesController');
	Route::resource('departments','DepartmentsController');
	Route::resource('departments.team-leads','TeamLeadsController');
	Route::resource('designations','DesignationsController');
	Route::resource('clients','ClientsController');
	Route::resource('project-categories','ProjectCategoriesController');
	Route::resource('task-categories','TaskCategoriesController');
	Route::resource('tasks','TasksController');
	Route::resource('tasks.task-logs','TaskLogsController');
	Route::post('tasks-complate','TasksController@complate')->name('complate');
	Route::resource('user-experience','UserExperiencesController');
	Route::resource('teams','TeamsController');
	Route::get('user-profile','UsersController@profile')->name('users.profile');
	Route::post('user-profile-update','UsersController@post_profile')->name('users.profile_update');
	Route::post('user-photo-update','UsersController@photo_update')->name('users.photo_update');
	Route::resource('blog-categories','BlogCategoriesController');
	Route::resource('blogs','BlogsController');
	Route::post('import-blogs','BlogsController@import')->name('blogs.import');
	Route::get('export-blogs','BlogsController@export')->name('blogs.export');
	Route::post('import-users','UsersController@import')->name('users.import');
	Route::get('export-users','UsersController@export')->name('users.export');

});

Route::get('blogs','BlogsController@index')->name('blogs');
Route::get('blog_detail','BlogsController@show')->name('blog_detail');


Route::group(['middleware'=>['auth'],], function(){ 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
