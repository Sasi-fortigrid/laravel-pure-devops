<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Override the default welcome screen route
Route::get('/', function () {
    try {
        // Query the MySQL container network to ensure it is responsive
        DB::connection()->getPdo();
        $dbStatus = "Connected Successfully!";
    } catch (\Exception $e) {
        $dbStatus = "Connection Failed: " . $e->getMessage();
    }

    return response()->json([
        'message' => 'Hello World from Laravel and Multi-Container Docker Pipeline!',
        'database_status' => $dbStatus,
        'php_version' => PHP_VERSION,
        'environment' => app()->environment()
    ]);
});
