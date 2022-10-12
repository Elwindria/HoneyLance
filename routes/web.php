<?php

use App\Http\Controllers\RedirectController;
use App\Http\Livewire\Index;
use App\Http\Livewire\UserSettings;
use App\Http\Livewire\Trades;
use App\Http\Livewire\Tags;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Index::class)->name('index');

Route::get('/redirect', [RedirectController::class, 'index'])->name('redirect');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/user-settings', UserSettings::class)->name('user-settings');
    Route::get('/trades/{display}', Trades::class)->name('trades');
    Route::get('/tags', Tags::class)->name('tags');
});
