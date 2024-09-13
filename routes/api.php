<?php

use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::prefix('auth')->group(function () {
    Route::post('/login', function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('auth_token')->plainTextToken;
    });

    Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();

        return response()->json('Logged out successfully', 200);
    });
});

Route::prefix('user')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/', function (Request $request) {
            return response()->json($request->user(), 200);
        });
    });

Route::prefix('pages')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/', [PageController::class, 'index']);
        Route::post('/', [PageController::class, 'store']);
        Route::get('/{page}', [PageController::class, 'show']);
        Route::put('/{page}', [PageController::class, 'update']);
        Route::delete('/{page}', [PageController::class, 'destroy']);
    });

Route::prefix('checkout')
    // ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/', function (Request $request) {
            $stripePriceId = 'price_deluxe_album';

            $quantity = 1;

            return $request->user()->checkout(
                [$stripePriceId => $quantity],
                [
                    'success_url' => route('checkout-success'),
                    'cancel_url' => route('checkout-cancel'),
                ],
            );
        })->name('checkout');

        Route::view('/success', 'checkout.success')->name('checkout-success');
        Route::view('/cancel', 'checkout.cancel')->name('checkout-cancel');
    });
