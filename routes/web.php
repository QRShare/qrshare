<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Pages\Cards;
use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('web.home');
Route::get('/cartao', Cards::class)->name('web.cards');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
