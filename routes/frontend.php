<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\user\LoginController;
use Spatie\Honeypot\ProtectAgainstSpam;


// frontend web pages
Route::group(['middleware' => ['SetLocale']], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('Frontend.Index');
    Route::get('/about', [FrontendController::class, 'about'])->name('Frontend.About');
    Route::get('/faq', [FrontendController::class, 'faq'])->name('Frontend.Faq');
    Route::get('/direction', [FrontendController::class, 'direction'])->name('Frontend.Direction');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('Frontend.Contact');
    Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('Frontend.PrivacyPolicy');
    Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('Frontend.TermsCondition');
    Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('Frontend.RefundPolicy');
    Route::get('/change/lang', [FrontendController::class, 'langChange'])->name('Frontend.LangChange');
    Route::post('/contact/request/submit', [FrontendController::class, 'contactRequestSubmit'])->name('Frontend.ContactRequestSubmit')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);


    // user login dashboard
    Route::get('/user/login', [LoginController::class, 'userLogin'])->name('Frontend.UserLogin');
    Route::get('/user/register', [LoginController::class, 'userRegister'])->name('Frontend.UserRegister');
    Route::get('/user/dashboard', [UserDashboardController::class, 'userDashboard'])->name('Frontend.UserDashboard');
    Route::get('/user/settings', [UserDashboardController::class, 'userSettings'])->name('Frontend.UserSettings');
    Route::get('/user/short/list', [UserDashboardController::class, 'userShortList'])->name('Frontend.UserShortList');
    Route::get('/user/ignore/list', [UserDashboardController::class, 'userIgnoreList'])->name('Frontend.UserIgnoreList');
    Route::get('/user/my/purchased', [UserDashboardController::class, 'userMyPurchased'])->name('Frontend.UserMyPurchased');
    Route::get('/user/connection', [UserDashboardController::class, 'userConnection'])->name('Frontend.UserConnection');
    Route::get('/user/payment/process', [UserDashboardController::class, 'userPaymentProcess'])->name('Frontend.UserPaymentProcess');
    Route::get('/user/checked/biodata', [UserDashboardController::class, 'userCheckedBiodata'])->name('Frontend.UserCheckedBiodata');
    Route::get('/user/support/report', [UserDashboardController::class, 'userSupportReport'])->name('Frontend.UserSupportReport');
    Route::get('/user/report/conversation', [UserDashboardController::class, 'userReportConversation'])->name('Frontend.UserReportConversation');
    Route::get('/user/biodata/preview', [UserDashboardController::class, 'userBiodataPreview'])->name('Frontend.UserBiodataPreview');
    Route::get('/user/edit/biodata', [UserDashboardController::class, 'userEditBiodata'])->name('Frontend.UserEditBiodata');
});


?>
