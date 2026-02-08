<?php

use App\Http\Controllers\SubscribeController;

Route::post('/subscribe', [SubscribeController::class, 'store']);
