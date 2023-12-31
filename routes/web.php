<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Collections\CollectionIndex;
use App\Livewire\Collections\CollectionShow;
use App\Livewire\Events\EventIndex;
use App\Livewire\Events\EventShow;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/eventos', EventIndex::class)->name('events.index');
    Route::get('/eventos/{eventId}', EventShow::class)->name('events.show');
});
