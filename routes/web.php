<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Laravel 12 Resource Routes
Route::resource('products', ProductController::class);

// Laravel 12 API demonstration
Route::get('/api/info', function () {
    return response()->json([
        'laravel_version' => app()->version(),
        'php_version' => PHP_VERSION,
        'environment' => app()->environment(),
        'timestamp' => now()->toISOString(),
        'features' => [
            'Laravel 12 Framework',
            'Modern PHP 8.2+',
            'SQLite Database',
            'Eloquent ORM',
            'Artisan CLI',
            'Blade Templates'
        ]
    ]);
});
