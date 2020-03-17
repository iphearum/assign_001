<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Assignment

| Method   | URI                  | Name            | Action                                           | Middleware                                      |
| -------- | -------------------- | --------------- | ------------------------------------------------ | ----------------------------------------------- |
| GET-HEAD | /                    | Closure         | web                                              |
| GET-HEAD | api/post             | post.index      | App\Http\Controllers\APIs\PostController@index   | api                                             |
| POST     | api/post             | post.store      | App\Http\Controllers\APIs\PostController@store   | api                                             |
| GET-HEAD | api/post/create      | post.create     | App\Http\Controllers\APIs\PostController@create  | api                                             |
| GET-HEAD | api/post/{post}      | post.show       | App\Http\Controllers\APIs\PostController@show    | api                                             |
| PUT      | PATCH                | api/post/{post} | post.update                                      | App\Http\Controllers\APIs\PostController@update | api |
| DELETE   | api/post/{post}      | post.destroy    | App\Http\Controllers\APIs\PostController@destroy | api                                             |
| GET-HEAD | api/post/{post}/edit | post.edit       | App\Http\Controllers\APIs\PostController@edit    | api                                             |
| GET-HEAD | api/user             |                 | Closure                                          | api,auth:api                                    |
| GET-HEAD | home                 | home            | App\Http\Controllers\PostController@index        | web                                             |
| GET-HEAD | post                 | post.index      | App\Http\Controllers\PostController@index        | web                                             |
| POST     | post                 | post.store      | App\Http\Controllers\PostController@store        | web                                             |
| GET-HEAD | post/create          | post.create     | App\Http\Controllers\PostController@create       | web                                             |
| GET-HEAD | post/{post}          | post.show       | App\Http\Controllers\PostController@show         | web                                             |
| PUT      | PATCH                | post/{post}     | post.update                                      | App\Http\Controllers\PostController@update      | web |
| DELETE   | post/{post}          | post.destroy    | App\Http\Controllers\PostController@destroy      | web                                             |
| GET-HEAD | post/{post}/edit     | post.edit       | App\Http\Controllers\PostController@edit         | web                                             |
