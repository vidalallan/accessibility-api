<?php

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


Route::get('/manager', function () {
    return view('manager');
});

Route::get('/dispositivo','App\Http\Controllers\DeviceController@indexView');
Route::post('/dispositivo','App\Http\Controllers\DeviceController@storeView');
Route::get('/dispositivo/{id}','App\Http\Controllers\DeviceController@destroyView');


Route::get('/questao','App\Http\Controllers\IssueController@indexView');
Route::post('/questao','App\Http\Controllers\IssueController@storeView');


Route::get('/avaliacao','App\Http\Controllers\AssessmentController@indexView');
Route::get('/todas-avaliacoes-sn','App\Http\Controllers\AssessmentController@countYesNoIdIssueView');



Route::get('/padrao','App\Http\Controllers\PatternController@indexView');

