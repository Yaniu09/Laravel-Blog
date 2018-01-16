<?php
use App\Post;
use Illuminate\Http\Request;

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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/*
 - Blog Routes -
*/

    Route::get('/', 'PostController@index');
    Route::get('/blogpost/create', 'PostController@create');
    Route::post('/blogpost/create/success', 'PostController@store');
    Route::get('/blogs/{post}', 'PostController@show'); 
    Route::get('/blogs/{post}/edit', 'PostController@edit');
    Route::post('/blogs/{post}/edit', 'PostController@update');
    Route::get('/blogs/{post}/delete', 'PostController@destroy');



