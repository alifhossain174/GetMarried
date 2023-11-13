<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use Spatie\Honeypot\ProtectAgainstSpam;


Route::get('/', [FrontendController::class, 'index'])->name('Frontend.Index');
Route::get('/about', [FrontendController::class, 'about'])->name('Frontend.About');
Route::get('/faq', [FrontendController::class, 'faq'])->name('Frontend.Faq');
Route::get('/direction', [FrontendController::class, 'direction'])->name('Frontend.Direction');
Route::get('/contact', [FrontendController::class, 'contact'])->name('Frontend.Contact');
Route::get('/user-login', [FrontendController::class, 'userLogin'])->name('Frontend.UserLogin');
Route::get('/user-register', [FrontendController::class, 'userRegister'])->name('Frontend.UserRegister');


?>
