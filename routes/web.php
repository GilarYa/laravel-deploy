<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    // User routes - dapat melihat produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // User management
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::put('/users/{user}/password', [AdminController::class, 'updateUserPassword'])->name('users.password');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');

        // Product management
        Route::get('/products', [AdminController::class, 'products'])->name('products');
        Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
        Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
        Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
        Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.delete');
    });
});

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
