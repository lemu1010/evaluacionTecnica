<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("empresas","empresasController@getAll")->name("getAllEmpresas");
Route::post("empresas","empresasController@add")->name("addEmpresas");
Route::get("empresas/{id}","empresasController@get")->name("getEmpresas");
Route::post("empresas/{id}","empresasController@edit")->name("editEmpresas");
Route::get("empresas/{id}","empresasController@delete")->name("deleteEmpresas");