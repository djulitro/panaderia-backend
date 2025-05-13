<?php

use Illuminate\Support\Facades\Route;

Route::get('welcome', function () {
    return response()->json(['message' => 'API is working']);
});