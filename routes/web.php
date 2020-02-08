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
    return view('free.top');
});

Route::get('/top', 'TopController@show')->name('top.show');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/profedit/{id}', 'ProfEditController@show')->name('profedit.show');
    Route::post('/profedit/{id}', 'ProfEditController@update')->name('profedit.update');
    Route::get('/withdraw', 'WithdrawController@show')->name('withdraw.show');
    Route::post('/withdraw', 'withdrawController@withdraw')->name('withdraw.withdraw');
    Route::get('/mypage/{id}', 'MypageController@show')->name('mypage.show');
    Route::get('/study', 'StudyController@show')->name('study.show');
    Route::post('/study', 'StudyController@record')->name('study.record');
    Route::get('/back', 'BackController')->name('back');
    Route::get('/timeline', 'TimelineController@show')->name('timeline');
    Route::post('/timeline/favorite', 'TimelineController@favoriteToggle')->name('timeline.favoriteToggle');
    Route::post('/timeline/update', 'TimelineController@update')->name('timeline.update');
});

Auth::routes();

