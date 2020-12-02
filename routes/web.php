<?php

use App\Http\Controllers\Shop\ProductController;

Route::get('/products/show', [ProductController::class, 'show']);


