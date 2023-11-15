<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\user\LoginController;
use Spatie\Honeypot\ProtectAgainstSpam;


// frontend web pages
Route::get('/', [FrontendController::class, 'index'])->name('Frontend.Index');
Route::get('/about', [FrontendController::class, 'about'])->name('Frontend.About');
Route::get('/faq', [FrontendController::class, 'faq'])->name('Frontend.Faq');
Route::get('/direction', [FrontendController::class, 'direction'])->name('Frontend.Direction');
Route::get('/contact', [FrontendController::class, 'contact'])->name('Frontend.Contact');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('Frontend.PrivacyPolicy');
Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('Frontend.TermsCondition');
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('Frontend.RefundPolicy');
Route::get('/change/lang', [FrontendController::class, 'langChange'])->name('Frontend.LangChange');

// user login dashboard
Route::get('/user/login', [LoginController::class, 'userLogin'])->name('Frontend.UserLogin');
Route::get('/user/register', [LoginController::class, 'userRegister'])->name('Frontend.UserRegister');

Route::get('/user/dashboard', [UserDashboardController::class, 'userDashboard'])->name('Frontend.UserDashboard');
Route::get('/user/settings', [UserDashboardController::class, 'userSettings'])->name('Frontend.UserSettings');


?>
