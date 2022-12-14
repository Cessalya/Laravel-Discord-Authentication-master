<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//CRUD
// $router->get('api/products', 'ProductController@index');
// $router->get('api/products/{id}', 'ProductController@show');
// $router->post('api/products/create', 'ProductController@store');
// $router->put('api/products/update/{id}', 'ProductController@update');
// $router->delete('api/products/delete/{id}', 'ProductController@destory');

// Route::get('/', function () use ($router) {
//     return $router->app->version();
// });


Route::post('/test', function () use ($router) {
    return $router->app->version();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Discord Authentication \\
Route::get('login', [App\Http\Controllers\DiscordController::class, 'login'])
    -> name('login');
    
Route::get('logout', [App\Http\Controllers\DiscordController::class, 'logout'])
    -> name('logout');