<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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
}) -> name('index');

Route::get('/cruds',[CrudController::class, 'index'])->name('cruds');
Route::get('/tambahdata',[CrudController::class,'crudtambah'])->name('crudtambah');
Route::post('/crudinsert', [CrudController::class,'crudinsert'])->name('crudinsert');

Route::get('/tampilkandata/{id}',[CrudController::class, 'tampilkandata']) ->name('tampilkandata');
Route::post('/updatedata/{id}',[CrudController::class, 'updatedata']) ->name('updatedata');

Route::get('/delete/{id}',[CrudController::class, 'delete']) ->name('delete');

//Export PDF
Route::get('/exportpdf',[CrudController::class, 'exportpdf']) ->name('exportpdf');

//Export Excel
Route::get('/exportexcel',[CrudController::class, 'exportexcel']) ->name('exportexcel');

//Import Excel
Route::post('/importexcel',[CrudController::class, 'importexcel']) ->name('importexcel');


Route::post('/postToDiscord', [CrudController::class, 'postToDiscord'])->name('postToDiscord');

// Route::get('/products', 'ProductController@index');
// $router->get('/products/{id}', 'ProductController@show');
// Route::post('/products/create', 'ProductController@store');
// $router->put('/products/update/{id}', 'ProductController@update');
// $router->delete('/products/delete/{id}', 'ProductController@destory');


// Route::get('/', function () use ($router) {
//     return $router->app->version();
// });


Route::resource('product',ProductControllers::class);
