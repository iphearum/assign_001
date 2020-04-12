<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function () {
    Route::post('login', 'ApiAuthController@login');
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('post', 'APIs\PostController');
});
