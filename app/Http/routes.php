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
    Route::resource('image',        'Backend\ImageController',      ['except'   => ['show']]);
    Route::resource('menu',         'Backend\MenuController',       ['except'   => ['show']]);
    Route::resource('poll',         'Backend\PollController');
    Route::resource('section',      'Backend\SectionController');
    Route::resource('tag',          'Backend\TagController');
    Route::resource('user',         'Backend\UserController');
});

//What every user can see
Route::get('',                      ['as' => 'index',       'uses' => 'Frontend\IndexController@index']);
Route::get('gallery',               ['as' => 'gallery',     'uses' => 'Frontend\GalleryController@index']);
Route::get('poll',                  ['as' => 'poll.index',  'uses' => 'Frontend\PollController@index']);
Route::get('poll/{poll}',           ['as' => 'poll.show',   'uses' => 'Frontend\PollController@show']);
Route::get('tag',                   ['as' => 'tag.index',   'uses' => 'Frontend\TagController@index']);
Route::get('tag/{tag}',             ['as' => 'tag.show',    'uses' => 'Frontend\TagController@show']);
Route::get('{section}',             ['as' => 'section',     'uses' => 'Frontend\SectionController@index']);
Route::get('{section}/{article}',   ['as' => 'article',     'uses' => 'Frontend\ArticleController@index']);

Route::group(['middleware' => 'ajax'], function() {
    Route::post('comment', ['as' => 'comment', 'middleware' => 'auth', 'uses' => 'Frontend\ArticleController@comment']);

    Route::post('poll/{poll}',          ['as' => 'poll.vote',       'uses' => 'Frontend\PollController@vote']);
    Route::post('{section}/{article}',  ['as' => 'article.rate',    'uses' => 'Frontend\ArticleController@rate']);
});

//Redirect everything other to the index page
Route::any('{any}', function() {
    return redirect()->route('index');
})->where('any', '.*');