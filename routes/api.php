<?php

use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotographerController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest:api'], function () {

		Route::resource('albums', AlbumsController::class);
		Route::resource('photographer', PhotographerController::class);

});
