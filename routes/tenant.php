<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Tenancy\TaskController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Route::get('/', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth'])->group(function() {
        Route::get('/', function () {
            return view('tenancy.dashboard');
        })->name('dashboard');

        Route::get('file/{path}', function($path) {
            return response()->file(Storage::path($path));
        })
        ->where('path', '.*')
        ->name('file');

        Route::resource('tenants', TenantController::class)->except(['show']);
        Route::resource('tasks', TaskController::class);
    });
    
    require __DIR__.'/auth.php';
});
