<?php

use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'moddleware' => 'auth'
], function () {
    Route::resource('post', 'PostController');
});
Auth::routes();
Route::get('/home', 'PostController@index')->name('home');

// Route::get('/category/{id}', function ($id) {
//     $category = Category::findOrfail($id);
//     $category->post;
//     return $category;
// });
Route::get('category/{id}', 'PostController@category');

