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
    return redirect()->route('translator.index');
});

Route::prefix('translator')->group(function () {
    Route::get('/', function () {
       return view('translator.index');
    })->name('translator.index');

    Route::controller(TranslationController::class)->group(function () {

        //text

        Route::get('/text', 'getText')->name('translator.text');

        Route::post('/text', 'translateText')->name('translator.traslateText');

        Route::get('/text/historical', 'getAllTranslations')->name('translation.getAllTranslation');

        //document

        //dictionary
    });

    Route::get('/ducument', function () {
        return view('translator.document');
    })->name('translator.document');

    Route::get('/dictionary', function () {
        return view('translator.dictionary');
    })->name('translator.dictionary');
});
