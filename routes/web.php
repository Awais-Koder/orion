<?php

use App\Livewire\FilterPage;
use App\Livewire\Markertypes;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', Welcome::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::get('filters/{markerTypeId?}/{categoryId?}' , FilterPage::class)->name('filter.page');
});
Route::get('marker-types' , Markertypes::class)->name('marker.types');


require __DIR__.'/auth.php';
