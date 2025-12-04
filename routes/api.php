<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlurayController;
use App\Http\Controllers\DvdController;
use App\Http\Controllers\CassetteController;
use App\Http\Controllers\VhsController;
use App\Http\Controllers\VinylController;
use App\Http\Controllers\DvdaudioController;
use App\Http\Controllers\AuthController;


/**
 * =============1================
 * unprotected routes for user registration and login
 */
Route::apiResource('vinyls', VinylController::class);

Route::middleware('auth:sanctum')->group(function () {
    /**
     * ============2================
     * user logout route
     */

    /**
     * ============4================
     * bluray API routes
     */

    /**
     * ============5================
     * dvd API routes
     */

    /**
     * 
     * ============6================
     * cassette API routes
     */

    /**
     * ============7================
     * vhs API routes
     */

    /**
     * ============8================
     * vinyl API routes
     */

    /**
     * ============9================
     * dvd audios API routes
     */

});

