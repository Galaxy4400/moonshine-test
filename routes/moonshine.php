<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;


Route::prefix('laravel-filemanager')->group(function () {
	Lfm::routes();
});