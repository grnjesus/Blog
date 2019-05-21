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

//Создаем таблицу маршрутизации для контроллера
Route::resource('entries','EntryController');

// Объявляем маршруты для ресурсного контроллера CommentsController, назначая слово comments префиксом URI 
Route::resource('comments', 'CommentsController'); 
 
// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,объявляем маршрут самостоятельно. 
Route::get('comments/{comment}/remove', 'CommentsController@remove')      
->name('comments.remove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('entries/{entry}/remove', 'EntryController@remove')->name('entries.remove');
