<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewsController;

Route::get('/', [ReviewsController::class, 'index']);
