<?php

use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Settings;
use App\Livewire\Pages\Member;
use App\Livewire\Package;
use App\Livewire\Company;
use App\Livewire\Region;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackageController;
use App\Livewire\Service;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/members', MemberController::class);
Route::apiResource('packages', PackageController::class);
// Route::apiResource('companies', CompanyController::class);



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
// Route::get('/company', Company::class)->name('company');



Route::get('/company', Company::class)->name('company');
Route::get('/services', Service::class)->name('services');
Route::get('/regions', Region::class)->name('regions');
Route::get('/packages', Package::class)->name('packages');