<?php

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

Route::get('/', 'IndexView')->name('index');
Route::get('shop/{shop}', 'ShopView')->name('shop');

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', 'Auth\Logout')->name('logout');
    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');

    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::view('/', 'checkout')->name('index');
        Route::view('complete', 'checkout-complete')->name('complete');
    });

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function() {
            return redirect()->route('dashboard.invoices.index');
        })->name('index');

        Route::prefix('invoices')->name('invoices.')->group(function () {
            Route::view('/', 'dashboard.invoice.index')->name('index');
            Route::get('{invoice}', 'Dashboard\InvoiceView')->name('invoice');
        });
    });
});
