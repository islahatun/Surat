<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratPdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/surat/{surat}/pdf', [SuratPdfController::class, 'generate'])
    ->name('surat.pdf');
