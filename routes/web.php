<?php

use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('translator')->group(function () {
    Route::get('/', function () {
       return view('translator.index');
    })->name('translator.index');

    Route::controller(TranslationController::class)->group(function () {
        Route::get('/text', 'getText')->name('translator.text');

        Route::post('/text', 'translateText')->name('translator.traslate.text');
    });

    Route::get('/ducument', function () {
        return view('translator.document');
    })->name('translator.document');

    Route::get('/dictionary', function () {
        return view('translator.dictionary');
    })->name('translator.dictionary');
});
