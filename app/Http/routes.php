<?php

//Register and login
Route::group(['prefix' => 'auth'], function() {
    Route::get('register',      ['as' => 'register',    'uses' => 'Auth\AuthController@getRegister']);
    Route::post('register',     ['as' => 'register',    'uses' => 'Auth\AuthController@postRegister']);
    Route::get('login',         ['as' => 'login',       'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login',        ['as' => 'login',       'uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout',        ['as' => 'logout',      'uses' => 'Auth\AuthController@getLogout']);
});

//Forgotten password
Route::group(['prefix' => 'password'], function() {
    Route::get('email',         ['as' => 'email',       'uses' => 'Auth\PasswordController@getEmail']);
    Route::post('email',        ['as' => 'email',       'uses' => 'Auth\PasswordController@postEmail']);
    Route::get('reset/{token}', ['as' => 'reset',       'uses' => 'Auth\PasswordController@getReset']);
    Route::post('reset',        ['as' => 'reset',       'uses' => 'Auth\PasswordController@postReset']);
});

//What admins can see
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('',                  ['as' => 'admin.index',   'uses' => 'Backend\IndexController@index']);

    Route::resource('article',      'Backend\ArticleController');
    Route::resource('ban_email',    'Backend\BanEmailController',   ['except'   => ['show', 'edit', 'update']]);
    Route::resource('ban_ip',       'Backend\BanIpController',      ['except'   => ['show', 'edit', 'update']]);
    Route::resource('comment',      'Backend\CommentController',    ['only'     => ['index', 'update', 'destroy']]);
    Route::resource('image',        'Backend\ImageController');
    Route::resource('menu',         'Backend\MenuController');
    Route::resource('poll',         'Backend\PollController');
    Route::resource('section',      'Backend\SectionController');
    Route::resource('tag',          'Backend\TagController');
    Route::resource('user',         'Backend\UserController');
});

//What every user can see
Route::get('',                              ['as' => 'index',   'uses' => 'Frontend\IndexController@index']);
Route::get('polls',                         ['as' => 'polls',   'uses' => 'Frontend\PollsController@index']);
Route::get('tag/{tag_slug}',                ['as' => 'tag',     'uses' => 'Frontend\TagController@index']);
Route::get('{section_slug}',                ['as' => 'section', 'uses' => 'Frontend\SectionController@index']);
Route::get('{section_slug}/{article_slug}', ['as' => 'article', 'uses' => 'Frontend\ArticleController@index']);

Route::group(['middleware' => 'ajax'], function() {
    Route::post('comment',  ['as' => 'comment', 'uses' => 'Frontend\ArticleController@comment']);
    Route::post('vote',     ['as' => 'vote',    'uses' => 'Frontend\PollController@vote']);
    Route::post('rate',     ['as' => 'rate',    'uses' => 'Frontend\ArticleController@rate']);
});

//Redirect everything other to the index page
Route::any('{any}', function() {
    return redirect()->route('index');
})->where('any', '.*');