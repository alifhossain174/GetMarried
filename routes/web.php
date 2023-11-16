<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WesbiteThemeColorController;
use App\Http\Controllers\SocialMediaLinksController;
use App\Http\Controllers\LogoFaviconController;
use App\Http\Controllers\CustomCssJsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomepageBiodataController;

// Auth::routes();
Auth::routes([
    'login' => true,
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


// backend routes
Route::group(['middleware' => ['auth', 'CheckUserType']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('change/password/page', [HomeController::class, 'changePasswordPage'])->name('ChangePasswordPage');
    Route::post('change/password', [HomeController::class, 'changePassword'])->name('ChangePassword');
    Route::get('google/recaptcha', [HomeController::class, 'googleRecaptchaPage'])->name('GoogleRecaptchaPage');
    Route::post('update/google/recaptcha', [HomeController::class, 'updateGoogleRecaptcha'])->name('UpdateGoogleRecaptcha');


    // contact request
    Route::get('contact/requests', [HomeController::class, 'contactRequests'])->name('ContactRequests');
    Route::get('approve/contact/request/{slug}', [HomeController::class, 'approveContactRequest'])->name('ApproveContactRequest');
    Route::get('deny/contact/request/{slug}', [HomeController::class, 'denyContactRequest'])->name('DenyContactRequest');
    Route::get('delete/contact/request/{slug}', [HomeController::class, 'deleteRequest'])->name('DeleteRequest');


    //Website Theme Color
    Route::get('/website/theme/page', [WesbiteThemeColorController::class, 'websiteThemePage'])->name('WebsiteThemePage');
    Route::post('/update/website/theme/color', [WesbiteThemeColorController::class, 'updateWebsiteThemeColor'])->name('UpdateWebsiteThemeColor');


    //Social Media Links
    Route::get('/social/media/page', [SocialMediaLinksController::class, 'socialMediaPage'])->name('SocialMediaPage');
    Route::post('/update/social/media/link', [SocialMediaLinksController::class, 'updateSocialMediaLinks'])->name('UpdateSocialMediaLinks');


    // logo & favicon
    Route::get('/logo/favicon', [LogoFaviconController::class, 'logoFaviconPage'])->name('LogoFaviconPage');
    Route::post('/update/logo/favicon', [LogoFaviconController::class, 'updateLogoFavicon'])->name('UpdateLogoFavicon');


    // Custom Css JS
    Route::get('/custom/css/js', [CustomCssJsController::class, 'customCssJsPage'])->name('CustomCssJsPage');
    Route::post('/update/custom/css/js', [CustomCssJsController::class, 'updateCustomCssJs'])->name('UpdateCustomCssJs');


    //Seo Routes
    Route::get('/seo/homepage', [SeoController::class, 'seoHomePage'])->name('SeoHomePage');
    Route::post('/update/seo/homepage', [SeoController::class, 'updateSeoHomePage'])->name('UpdateSeoHomePage');
    Route::get('/generate/sitemap', [SeoController::class, 'generateSitemap'])->name('GenerateSitemap');
    Route::post('/upload/sitemap', [SeoController::class, 'uploadSitemap'])->name('UploadSitemap');


    // homepage dynamic content routes
    Route::get('homepage/banner', [BannerController::class, 'homePageBanner'])->name('HomePageBanner');
    Route::post('update/homepage/banner', [BannerController::class, 'updateHomePageBanner'])->name('UpdateHomePageBanner');
    Route::get('homepage/biodata', [HomepageBiodataController::class, 'homePageBiodata'])->name('HomePageBiodata');
    Route::post('update/homepage/biodata', [HomepageBiodataController::class, 'updateHomePageBiodata'])->name('UpdateHomePageBiodata');
    // Route::get('homepage/statistics')
    Route::get('contact/us/page', [ContactController::class, 'contactUsPage'])->name('ContactUsPage');
    Route::post('update/contact/page/info', [ContactController::class, 'updateContactUsPage'])->name('UpdateContactUsPage');


});

// linking other Routes
require 'anonna.php';
require 'config.php';
require 'userRolePermission.php';
require 'frontend.php';
