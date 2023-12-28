<?php

use App\Providers\Router\RoutesCollection as Route;
use App\Providers\Router\RouteServiceProvider;

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

Route::get('/', [ App\Http\Controller\HomeController::class, 'index' ]);
Route::get('/users', [ App\Http\Controller\UserController::class, 'index' ]);
Route::post('/hamid', [ App\Http\Controller\UserController::class, '' ]);

$collection = Route::collection();
new RouteServiceProvider($collection);