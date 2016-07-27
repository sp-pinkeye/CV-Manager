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

use App\User;
use Illuminate\Http\Request;

  
Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

	Route::resource( 'users', 'UsersController' ) ;
	Route::resource( 'cvs', 'CvsController' ) ;
	Route::resource( 'skill_list', 'SkillListController' ) ;
    Route::resource( 'jobs', 'JobsController' ) ;
    Route::resource( 'education', 'EducationController' ) ;
    Route::resource( 'qualification', 'QualificationController' ) ;
}) ;







