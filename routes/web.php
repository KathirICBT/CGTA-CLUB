<?php

use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/livewire/layout-component');
})->name('layout-component');

//Route::middleware(['auth'])->group(function () {
//    Route::get('/dashboard', Dashboard::class)->name('dashboard');
//    Route::get('/settings', Settings::class)->name('settings');
//});

Route::get('/dashboard', function () {
    return view('/livewire/pages/dashboard');
})->name('dashboard');

Route::get('/settings', function () {
    return view('/livewire/pages/settings');
})->name('settings');

//Route::get('/dashboard', Dashboard::class)->name('dashboard');
//Route::get('/settings', Settings::class)->name('settings');

