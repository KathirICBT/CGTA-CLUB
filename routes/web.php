<?php

use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Events\EventCategoryComp\EventCategoryFormComponent;
use App\Livewire\Pages\Events\Events;
use App\Livewire\Pages\Events\EventCategories;
use App\Livewire\Pages\Events\EventForm;
use App\Livewire\Pages\Events\EventView;
use App\Livewire\Pages\Member\Member;
use App\Livewire\Pages\Member\MemberForm;
use App\Livewire\Pages\Member\MemberView;
use App\Livewire\Pages\Settings;
use App\Livewire\PackageService;
use App\Livewire\Package;
use App\Livewire\Company;
use App\Livewire\Region;
use App\Livewire\UserPanel\UserComponent;
use App\Livewire\UserPanel\LandingPage;
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
Route::get('/member/member-form/{id?}', MemberForm::class)->name('member-form');
Route::get('/member/member-view/{memberId}', MemberView::class)->name('member-view');

Route::get('/events', Events::class)->name('events');
Route::get('/events/event-form/{id?}', EventForm::class)->name('event-form');
Route::get('/event/event-view/{eventId}', EventView::class)->name('event-view');

Route::get('/eventCategory/{id?}', EventCategories::class)->name('event-category');
Route::get('/eventCategoryForm', EventCategoryFormComponent::class)->name('event-categoryForm');


Route::get('/settings', Settings::class)->name('settings');
// Route::get('/company', Company::class)->name('company');



Route::get('/company', Company::class)->name('company');
Route::get('/services', Service::class)->name('services');
Route::get('/regions', Region::class)->name('regions');
Route::get('/packages', Package::class)->name('packages');


Route::get('/package-service', PackageService::class)->name('package-service');



// USER PANEL START ===============================================================================================

Route::get('/user-panel', UserComponent::class)->name('user-panel');
Route::get('/landing-page', LandingPage::class)->name('landing-page');


// USER PANEL END =================================================================================================
