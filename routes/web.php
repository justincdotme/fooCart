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

Route::get('contact', [
    \App\Http\Controllers\ContactFormController::class, 'index'
])->name('contact');

Route::post('contact', [
    \App\Http\Controllers\ContactFormController::class, 'store'
])->name('contact.store');

Auth::routes();