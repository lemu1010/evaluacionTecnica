<?php


Route::get('/', "pageController@inicio")->name("inicio");
Route::get('/eliminar/{id}', "pageController@eliminar")->name("eliminar");
Route::post('/editar/{id}', "pageController@editar")->name("editar");
Route::get('api/empresa/{id}', "pageController@preEliminar")->name("preEliminar");
Route::get('api/editar/{id}', "pageController@preEditar")->name("preEditar");
Route::post("/","pageController@crear")->name("empresa.crear");