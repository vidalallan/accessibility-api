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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/device','App\Http\Controllers\DeviceController@index');
Route::post('/device','App\Http\Controllers\DeviceController@store');

Route::get('/issue','App\Http\Controllers\IssueController@index');
Route::post('/issue','App\Http\Controllers\IssueController@store');

Route::get('/assessment','App\Http\Controllers\AssessmentController@index');
Route::post('/assessment','App\Http\Controllers\AssessmentController@store');
Route::get('/assessment/{id}','App\Http\Controllers\AssessmentController@showIdIssue');
Route::get('/assessment/{id}/problem/{problem}','App\Http\Controllers\AssessmentController@showIdIssueProblem');
