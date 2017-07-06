<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('tipos','TipoController');
Route::resource('animal','AnimalController',
    ['only'=>['index','show']]);
Route::resource('tipos.animales','TipoAnimalController',
    ['except'=>['show']]);
