<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Pages\Cards;
use App\Livewire\Pages\CardsCreate;
use App\Livewire\Pages\CardsShow;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('web.home');
Route::get('/cartao', Cards::class)->name('web.cards');
Route::middleware('auth:sanctum')->get('/cartao/criar', CardsCreate::class)->name('web.cards.create');
Route::get('/cartao/{slug}', CardsShow::class)->name('web.cards.show');
Route::get('/contato', Contact::class)->name('web.contact');
Route::get('/termos', Contact::class)->name('web.terms');
Route::get('/privacidade', Contact::class)->name('web.privacy');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
