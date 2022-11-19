<?php

use App\Http\Controllers\Controller;
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

Route::controller(Controller::class)->group(function () {
  Route::get('/home', 'home');
  Route::get('/gallery', 'gallery');
  Route::post('/folder', 'files');
  Route::post('/email', 'email');
});
