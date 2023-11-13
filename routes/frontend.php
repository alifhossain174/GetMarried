<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use Spatie\Honeypot\ProtectAgainstSpam;


Route::get('/', [FrontendController::class, 'index'])->name('Frontend.Index');

?>
