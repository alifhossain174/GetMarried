<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\PaymentController;
use Spatie\Honeypot\ProtectAgainstSpam;


// frontend web pages
Route::group(['middleware' => ['SetLocale', 'web']], function () {

    Route::get('/', [FrontendController::class, 'index'])->name('Frontend.Index');
    Route::get('/about', [FrontendController::class, 'about'])->name('Frontend.About');
    Route::get('/faq', [FrontendController::class, 'faq'])->name('Frontend.Faq');
    Route::get('/direction', [FrontendController::class, 'direction'])->name('Frontend.Direction');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('Frontend.Contact');
    Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('Frontend.PrivacyPolicy');
    Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('Frontend.TermsCondition');
    Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('Frontend.RefundPolicy');
    Route::get('/change/lang', [FrontendController::class, 'langChange'])->name('Frontend.LangChange');
    Route::post('/district/wise/upazila', [FrontendController::class, 'districtWiseUpazila'])->name('Frontend.DistrictWiseUpazila');
    Route::post('/contact/request/submit', [FrontendController::class, 'contactRequestSubmit'])->name('Frontend.ContactRequestSubmit')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);
    Route::get('/biodata/details/{slug}', [FrontendController::class, 'biodataDetails'])->name('Frontend.BiodataDetails');


    Route::get('/search/results', [FrontendController::class, 'searchResults'])->name('Frontend.SearchResults');
    Route::get('/remove/search/filters', [FrontendController::class, 'removeSearchFilters'])->name('Frontend.RemoveSearchFilters');
    Route::get('/change/search/result/order', [FrontendController::class, 'changeSearchResultOrder'])->name('Frontend.ChangeSearchResultOrder');
    Route::get('filter/search/results', [FrontendController::class, 'filterSearchResults'])->name('Frontend.FilterSearchResults');
    Route::get('/search/biodata/no', [FrontendController::class, 'searchBiodataNo'])->name('Frontend.SearchBiodataNo');



    // user login dashboard
    Route::get('/user/login', [LoginController::class, 'userLogin'])->name('Frontend.UserLogin');
    Route::get('/user/register', [LoginController::class, 'userRegister'])->name('Frontend.UserRegister');
    Route::get('/user/forget/password', [LoginController::class, 'userForgetPassword'])->name('Frontend.UserForgetPassword');
    Route::post('/send/forget/password/code', [LoginController::class, 'sendForgetPasswordCode'])->name('Frontend.SendForgetPasswordCode');
    Route::get('/new/password', [LoginController::class, 'newPasswordPage'])->name('Frontend.NewPasswordPage');
    Route::post('/change/forgotten/password', [LoginController::class, 'changeForgetPassword'])->name('Frontend.ChangeForgetPassword');

    // social login
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('Frontend.RedirectToGoogle');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('Frontend.HandleGoogleCallback');


    Route::group(['middleware' => ['CheckCustomer']], function () {

        // verify routes
        Route::get('/user/verification', [LoginController::class, 'userVerification'])->name('Frontend.UserVerification');
        Route::post('/user/verify/check', [LoginController::class, 'userVerifyCheck'])->name('Frontend.UserVerifyCheck');
        Route::get('/user/verification/resend', [LoginController::class, 'userVerificationResend'])->name('Frontend.UserVerificationResend');

        Route::group(['middleware' => ['CheckUserVerification', 'DemoMode']], function () {

            Route::get('/user/dashboard', [UserDashboardController::class, 'userDashboard'])->name('Frontend.UserDashboard');
            Route::get('/user/settings', [UserDashboardController::class, 'userSettings'])->name('Frontend.UserSettings');
            Route::post('/user/password/change', [UserDashboardController::class, 'userPasswordChange'])->name('Frontend.UserPasswordChange');
            Route::post('/user/biodata/remove', [UserDashboardController::class, 'userBiodataRemove'])->name('Frontend.UserBiodataRemove');
            Route::get('/remove/biodata/removal/request', [UserDashboardController::class, 'removeBiodataRemovalReq'])->name('Frontend.RemoveBiodataRemovalReq');
            Route::get('/user/short/list', [UserDashboardController::class, 'userShortList'])->name('Frontend.UserShortList');
            Route::get('/remove/liked/biodata/{slug}', [UserDashboardController::class, 'removeLikedBiodata'])->name('Frontend.RemoveLikedBiodata');
            Route::get('/user/ignore/list', [UserDashboardController::class, 'userIgnoreList'])->name('Frontend.UserIgnoreList');
            Route::get('/user/my/purchased', [UserDashboardController::class, 'userMyPurchased'])->name('Frontend.UserMyPurchased');
            Route::get('/user/connection', [UserDashboardController::class, 'userConnection'])->name('Frontend.UserConnection');
            Route::get('/user/payment/process/{slug}', [UserDashboardController::class, 'userPaymentProcess'])->name('Frontend.UserPaymentProcess');
            Route::get('/user/checked/biodata', [UserDashboardController::class, 'userCheckedBiodata'])->name('Frontend.UserCheckedBiodata');
            Route::get('/user/support/report', [UserDashboardController::class, 'userSupportReport'])->name('Frontend.UserSupportReport');
            Route::get('/user/report/conversation/{slug}', [UserDashboardController::class, 'userReportConversation'])->name('Frontend.UserReportConversation');
            Route::get('/user/biodata/preview', [UserDashboardController::class, 'userBiodataPreview'])->name('Frontend.UserBiodataPreview');
            Route::get('/user/edit/biodata', [UserDashboardController::class, 'userEditBiodata'])->name('Frontend.UserEditBiodata');
            Route::get('/user/create/report/{slug}', [UserDashboardController::class, 'userCreateReport'])->name('Frontend.UserCreateReport');
            Route::post('/submit/biodata/complain', [UserDashboardController::class, 'submitBiodataComplain'])->name('Frontend.SubmitBiodataComplain');
            Route::post('/send/complain/message', [UserDashboardController::class, 'sendComplainMessage'])->name('Frontend.SendComplainMessage');
            Route::post('purchase/connection', [UserDashboardController::class, 'purchaseConnection'])->name('Frontend.PurchaseConnection');

            Route::post('/save/general/info/biodata', [BiodataController::class, 'saveGeneralInfoBiodata'])->name('Frontend.SaveGeneralInfoBiodata');
            Route::post('/save/address/biodata', [BiodataController::class, 'saveAddressBiodata'])->name('Frontend.SaveAddressBiodata');
            Route::post('/save/biodata/info', [BiodataController::class, 'saveBiodataInfo'])->name('Frontend.SaveBiodataInfo');
            Route::post('/save/contact/info/biodata', [BiodataController::class, 'saveContactInfoBiodata'])->name('Frontend.SaveContactInfoBiodata');


            // redirect after login routes
            Route::get('add/to/liked/list/{slug}', [UserDashboardController::class, 'addToLikedList'])->name('Frontend.AddToLikedList');
            Route::get('add/to/disliked/list/{slug}', [UserDashboardController::class, 'addToDislikedList'])->name('Frontend.addToDislikedList');
            Route::get('view/biodata/contact/info/{slug}', [UserDashboardController::class, 'viewBiodataContactInfo'])->name('Frontend.ViewBiodataContactInfo');


            // payment routes start
            Route::get('sslcommerz/order/payment/{id}', [PaymentController::class, 'orderPayment'])->name('order.payment');
            Route::post('sslcommerz/success', [PaymentController::class, 'success'])->name('payment.success');
            Route::post('sslcommerz/failure', [PaymentController::class, 'failure'])->name('failure');
            Route::post('sslcommerz/cancel', [PaymentController::class, 'cancel'])->name('cancel');
            Route::post('sslcommerz/ipn', [PaymentController::class, 'ipn'])->name('payment.ipn');
            // payment routes end

        });
    });

});


?>
