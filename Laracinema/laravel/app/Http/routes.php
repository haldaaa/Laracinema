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

Route::get('/', function () {
    return view('Pages/index');
});



/***************** PAGE STATIQUE ******************/

Route::get('/faq', function () {
    return view('Pages/faq');
});


Route::get('/about', function () {
    return view('Pages/about');
});

Route::get('/contact', function () {
    return view('Pages/contact');
});


Route::get('/', [

    'uses' => 'MainController@index'

]);


Route::controllers([

    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'

]);

Route::get('/register', function (){
    return view ('Auth/register');
});

/*********************MOVIE***********************/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function ()
{

    Route::get('/', [

        'as' => 'index',
        'uses' => 'MainController@index'

    ]);

    Route::get('/dashboard',[

        'as'=>'dashboard',
        'uses'=>'MainController@dashboard'

    ]);



    Route::group(['prefix' => 'movies'], function()
    {

        Route::get('/index',
            [
                'as' => 'movies_index',
                'uses' => 'MoviesController@index'
            ]);

        Route::get('/create',
            [
                'as' => 'movies_create',
                'uses' => 'MoviesController@create'
            ]);

        Route::get('/read{id}',
            [
                'uses' => 'MoviesController@read'
            ]);

        Route::get('/edit/{id}',
            [
                'as' => 'movies_edit',
                'uses' => 'MoviesController@edit'
            ]);

        Route::get('/delete/{id}',
            [
                'as' => 'movies_delete',
                'uses' => 'MoviesController@delete'
            ]);

        Route::get('/activate/{id}',
            [
                'as' => 'movies_activate',
                'uses' => 'MoviesController@activate'
            ]);

        Route::get('/cover/{id}',
            [
                'as' => 'movies_cover',
                'uses' => 'MoviesController@cover'
            ]);

        //enrengistre un film en bdd depuis mon formulaire
        Route::post('/store/{id?}',
            [
                'as'  => 'movies_store',
                'uses' => 'MoviesController@store'
            ]);

        Route::get('/like/{id}/{action}',
            [
                'as' => 'movies_like',
                'uses' => 'MoviesController@like'
            ]);
    });


    /*********************CATEGORIE***********************/


    Route::group(['prefix' => 'categories'],function()
    {

        Route::post('/store/{id?}', [

            'as' => 'categories_store',
            'uses' => 'CategoriesController@store'
        ]);

        Route::get('/index', [

            'as' => 'categories_index',
            'uses' => 'CategoriesController@index'
        ]);

        Route::get('/create', [

            'as'    => 'categories_create',
            'uses' => 'CategoriesController@create'
        ]);

        Route::get('/read/{id}', [

            'as'  => 'Categories_read',
            'uses' => 'CategoriesController@read'
        ])->where('id', '[0-9]+');

        //cette route prendra ID en paramètre
        Route::get('/edit/{id}', [

            'as' => 'Categories_edit',
            'uses' => 'CategoriesController@edit'
        ])->where('id', '[0-9]+');

        Route::get('/delete/{id}', [

            'as' =>'Categories_delete',
            'uses' => 'CategoriesController@delete'
        ])->where('id', '[0-9]+');



    });


    Route::group(['prefix' => "api"], function () {
        // mon retour en JSON de mes catégories
        Route::get('/categories', [
            'as' => 'api_categories',
            'uses' => 'ApiController@categories'
        ]);

        Route::get('/actors', [
            'as' => 'api_actors',
            'uses' => 'ApiController@actors'
        ]);


    });

    /*********************ACTORS***********************/

    Route::group(['prefix' => 'actors'],function()
    {

        Route::get('/index', [

            'as' => 'actors_index',
            'uses' => 'ActorsController@index'
        ]);

        Route::get('/create', [

            'as' => 'actors_create',
            'uses' => 'ActorsController@create'
        ]);

        Route::get('/read/{id}', [

            'as' => 'Actors_read',
            'uses' => 'ActorsController@read'
        ])->where('id', '[0-9]+') ;

        Route::get('/edit/{id}', [

            'as' => 'Actors_edit',
            'uses' => 'ActorsController@edit'
        ])->where('id', '[0-9]+');

        Route::get('/delete/{id}', [

            'as' => 'Actors_delete',
            'uses' => 'ActorsController@delete'
        ])->where('id', '[0-9]+');

        Route::post('/store', [

            'as' => 'actors_store',
            'uses' => 'ActorsController@store'
        ]);

    });



    /*********************DIRECTORS***********************/

    Route::group(['prefix' => 'directors' ], function()
    {

        Route::post('/store', [

            'as' => 'directors_store',
            'uses' => 'DirectorsController@store'
        ]);

        Route::get('/index',[

            'as'    => 'directors_index',
            'uses' => 'DirectorsController@index'
        ]);

        Route::get('/create',[

            'as'  => 'directors_create',
            'uses' => 'DirectorsController@create'
        ]);

        Route::get('/edit/{id}',[

            'as'  => 'Directors_edit',
            'uses' => 'DirectorsController@edit'
        ])->where('id', '[0-9]+');


        Route::get('/read/{id}',[

            'as'  => 'Directors_read',
            'uses' => 'DirectorsController@read'
        ])->where('id', '[0-9]+');


        Route::get('/delete/{id}',[

            'as'  => 'Directors_delete',
            'uses' => 'DirectorsController@delete'
        ])->where('id', '[0-9]+');
    });

    /*********************CINEMA***********************/
    Route::group(['prefix' => 'cinema'],function()
    {

        Route::get('/index', [

            'as' => 'cinema_index',
            'uses' => 'CinemaController@index'
        ]);

        Route::get('/create', [

            'as' => 'cinema_create',
            'uses' => 'CinemaController@create'
        ]);

        Route::post('/store', [

            'as' => 'cinema_store',
            'uses' => 'CinemaController@store'
        ]);


        Route::get('/delete/{id}',[

            'as'  => 'cinema_delete',
            'uses' => 'CinemaController@delete'
        ]);


    });


    Route::group(['prefix' => 'commentaire'],function()
    {

        Route::get('/index', [

            'as' => 'commentaires_index',
            'uses' => 'CommentaireController@index'
        ]);


        Route::get('/like1/{id}/{action}',
            [
                'as' => 'commentaires_like1',
                'uses' => 'CommentaireController@like'
            ]);


    });


    Route::group(['prefix' => 'administrators' ], function()

    {

       Route::get('/index' , [

        'as' => 'administrators_index',
         'uses' => 'AdministratorsController@index'

       ]) ;

        Route::get('/create', [

            'as' => 'administrators_create',
            'uses' => 'AdministratorsController@create'

        ]);

        Route::post('/store/{id?}', [

            'as' => 'administrators_store',
            'uses' => 'AdministratorsController@store'
        ]);

        Route::get('/delete/{id}', [

            'as' => 'administrators_delete',
            'uses' => 'AdministratorsController@delete'

        ]);

        Route::get('/edit/{id}',[

            'as'  => 'administrators_edit',
            'uses' => 'AdministratorsController@edit',
        ]);


    });
});