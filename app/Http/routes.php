<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']],function(){

    /** ************************************************************
     * REST routes for initializing the angularJS controller $scopes
     * *************************************************************
     */

    // Clubs
    Route::get('/clubs/all', 'Dashboard\ClubController@getAllClubs');
    Route::get('/clubs/all/teams', 'Dashboard\ClubController@getAllClubsWithTeams');
    Route::post('/clubs/create', 'Dashboard\ClubController@create');

    //Stadiums
    Route::get('/stadiums/all', 'Dashboard\StadiumController@getAllStadiums');
    Route::post('/stadiums/create', 'Dashboard\StadiumController@create');
    Route::get('/stadiums/all_clubs', 'Dashboard\StadiumController@getStadiumsWithClubs');

    //Teams
    Route::post('/teams/all', 'Dashboard\TeamController@getAllTeams');
    Route::post('/teams/create', 'Dashboard\TeamController@create');

    //People
    Route::post('/users/create', 'Dashboard\UserController@create');
    Route::get('/users/all', 'Dashboard\UserController@getAllUsers');


    /** ************************************************************
     * END REST PARS
     * *************************************************************
     */

    // API Routes
    Route::get('/api/index', 'APIController@index');
    Route::post('/api/upload/json', 'APIController@uploadJson');

    Route::any('/', function () {
        return view('index');
    } );

});






















