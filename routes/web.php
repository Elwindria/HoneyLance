<?php

use App\Http\Controllers\RedirectController;
use App\Http\Livewire\App\UserSettings;
use App\Http\Livewire\App\TradeStore;
use App\Http\Livewire\App\IndexTradeList;
use App\Http\Livewire\App\Tags;
use App\Http\Livewire\App\Informations;
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

Route::get('/', function() {
    return view('guest.landing-page');
})->name('index');

Route::get('/redirect', [RedirectController::class, 'index'])->name('redirect');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/user-settings', UserSettings::class)->name('user-settings');
    Route::get('/trade/{trade_id?}', TradeStore::class)->name('trade-store');
    Route::get('/trades', IndexTradeList::class)->name('trades-list');
    Route::get('/tags', Tags::class)->name('tags');
    Route::get('/informations', Informations::class)->name('informations');
});
