<?php

use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:api'], function () {

		Route::resource('albums', AlbumsController::class);
		Route::resource('photographers', PhotographerController::class);

		Route::prefix('photos')->group(function() {
			Route::get('get-featured',	[PhotoController::class, 'getFeatured']);
			Route::patch('like', [PhotoController::class, 'like']);
			Route::resource('/', PhotoController::class);
		});
});
