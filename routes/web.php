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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('console')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::middleware(['auth'])->group(function () {

            Route::get('/', 'AdminController@index')->name('console');

            Route::get('/list', 'ListController@index')->name('console/list');
            Route::get('/list/{id}', 'ListController@edit')->name('console/list/edit');
            Route::post('/list/{id}', 'ListController@save')->name('console/list/save');
            Route::get('/list/sort/down/{id}', 'ListController@sortUp')->name('console/list/sort/up');
            Route::get('/list/sort/up/{id}', 'ListController@sortDown')->name('console/list/sort/down');

            Route::get('/gift/{id}', 'GiftController@edit')->name('console/gift/edit');
            Route::post('/gift/{id}', 'GiftController@save')->name('console/gift/save');

            Route::get('/profile', 'ProfileController@index')->name('console/profile');
            Route::post('/profile', 'ProfileController@save')->name('console/profile-save');

            View::composer(['*'], function($view)
            {
                $user = \Illuminate\Support\Facades\Auth::user();
                if ($user) {
                    $userId = $user->id;
                    $menuLists = (new \App\GiftList())->where('user_id', $userId)->orderBy('sort', 'DESC')->get();
                    $view->with('menuLists', $menuLists);
                }
            });
        });
    });
});

Route::get('/user/{id}', 'PublicController@user')->name('user');
Route::get('/show/{id}', 'PublicController@show')->name('show');
Route::get('/like/{id}', 'PublicController@like')->name('like');
Route::get('/unlike/{id}', 'PublicController@unlike')->name('unlike');
Route::get('/gift/{id}', 'PublicController@gift')->name('gift');
Route::get('/claim/{id}', 'PublicController@claim')->name('claim');
Route::get('/unclaim/{id}', 'PublicController@unclaim')->name('unclaim');
