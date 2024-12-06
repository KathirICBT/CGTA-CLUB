<?php

use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Settings;
use App\Livewire\Pages\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;



//Route::middleware(['auth'])->group(function () {
//    Route::get('/dashboard', Dashboard::class)->name('dashboard');
//    Route::get('/settings', Settings::class)->name('settings');
//});

//Route::get('/dashboard', function () {
//    return view('/livewire/pages/dashboard');
//})->name('dashboard');
//
//Route::get('/member', function () {
//    return view('/livewire/pages/member');
//})->name('member');
//
//Route::get('/settings', function () {
//    return view('/livewire/pages/settings');
//})->name('settings');


Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/member', Member::class)->name('member');
Route::get('/settings', Settings::class)->name('settings');

