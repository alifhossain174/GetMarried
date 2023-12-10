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
use App\Http\Controllers\HomepageStatisticsController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\MobileAppController;
use App\Http\Controllers\TermsPolicyController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PricingPackageController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InstructionController;


Auth::routes();


// backend routes
Route::group(['middleware' => ['auth', 'CheckUserType']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('change/password/page', [HomeController::class, 'changePasswordPage'])->name('ChangePasswordPage');
    Route::post('change/password', [HomeController::class, 'changePassword'])->name('ChangePassword');
    Route::get('google/recaptcha', [HomeController::class, 'googleRecaptchaPage'])->name('GoogleRecaptchaPage');
    Route::post('update/google/recaptcha', [HomeController::class, 'updateGoogleRecaptcha'])->name('UpdateGoogleRecaptcha');
    Route::get('view/all/customers', [HomeController::class, 'viewAllCustomers'])->name('ViewAllCustomers');
    Route::get('download/registered/customer/excel', [HomeController::class, 'downloadCustomersExcel'])->name('DownloadCustomersExcel');

    // contact request
    Route::get('contact/requests', [HomeController::class, 'contactRequests'])->name('ContactRequests');
    Route::get('approve/contact/request/{slug}', [HomeController::class, 'approveContactRequest'])->name('ApproveContactRequest');
    Route::get('deny/contact/request/{slug}', [HomeController::class, 'denyContactRequest'])->name('DenyContactRequest');
    Route::get('delete/contact/request/{slug}', [HomeController::class, 'deleteRequest'])->name('DeleteRequest');
    Route::get('download/contact/requests/excel', [HomeController::class, 'downloadContactRequestsExcel'])->name('DownloadContactRequestsExcel');

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
    Route::get('mobile/app/section', [MobileAppController::class, 'mobileAppSection'])->name('MobileAppSection');
    Route::post('update/mobile/app/section', [MobileAppController::class, 'updateMobileAppSection'])->name('UpdateMobileAppSection');
    Route::get('contact/us/page', [ContactController::class, 'contactUsPage'])->name('ContactUsPage');
    Route::post('update/contact/page/info', [ContactController::class, 'updateContactUsPage'])->name('UpdateContactUsPage');

    // homepage statistics routes
    Route::get('homepage/statistics/config', [HomepageStatisticsController::class, 'homePageStatisticsConfig'])->name('HomePageStatisticsConfig');
    Route::post('update/homepage/statistics/config', [HomepageStatisticsController::class, 'updateHomePageStatisticsConfig'])->name('UpdateHomePageStatisticsConfig');
    Route::get('view/homepage/statistics', [HomepageStatisticsController::class, 'viewHomePageStatistics'])->name('ViewHomePageStatistics');
    Route::get('add/new/homepage/statistic', [HomepageStatisticsController::class, 'addHomePageStatistic'])->name('AddHomePageStatistic');
    Route::post('save/homepage/statistic', [HomepageStatisticsController::class, 'saveHomePageStatistic'])->name('SaveHomePageStatistic');
    Route::get('delete/homepage/statistic/{id}', [HomepageStatisticsController::class, 'deleteHomePageStatistic'])->name('DeleteHomePageStatistic');
    Route::get('edit/homepage/statistic/{id}', [HomepageStatisticsController::class, 'editHomePageStatistic'])->name('EditHomePageStatistic');
    Route::post('update/homepage/statistic', [HomepageStatisticsController::class, 'updateHomePageStatistic'])->name('UpdateHomePageStatistic');
    Route::get('rearrange/homepage/statistics', [HomepageStatisticsController::class, 'rearrangeHomePageStatistics'])->name('RearrangeHomePageStatistics');
    Route::post('save/rearranged/homepage/statistics', [HomepageStatisticsController::class, 'saveRearrangedHomePageStatistics'])->name('SaveRearrangedHomePageStatistics');

    // homepage how it works routes
    Route::get('how/it/works/config', [HowItWorksController::class, 'howItWorksConfig'])->name('HowItWorksConfig');
    Route::post('update/how/it/works/config', [HowItWorksController::class, 'updateHowItWorksConfig'])->name('UpdateHowItWorksConfig');
    Route::get('view/how/it/works', [HowItWorksController::class, 'viewHowItWorks'])->name('ViewHowItWorks');
    Route::get('add/new/how/it/works', [HowItWorksController::class, 'addHowItWorks'])->name('AddHowItWorks');
    Route::post('save/how/it/works', [HowItWorksController::class, 'saveHowItWorks'])->name('SaveHowItWorks');
    Route::get('delete/how/it/works/{id}', [HowItWorksController::class, 'deleteHowItWorks'])->name('DeleteHowItWorks');
    Route::get('edit/how/it/works/{id}', [HowItWorksController::class, 'editHowItWorks'])->name('EditHowItWorks');
    Route::post('update/how/it/works', [HowItWorksController::class, 'updateHowItWorks'])->name('UpdateHowItWorks');
    Route::get('rearrange/how/it/works', [HowItWorksController::class, 'rearrangeHowItWorks'])->name('RearrangeHowItWorks');
    Route::post('save/rearranged/how/it/works', [HowItWorksController::class, 'saveRearrangedHowItWorks'])->name('SaveRearrangedHowItWorks');

    // Faq config routes
    Route::get('faq/config', [FaqController::class, 'faqConfig'])->name('faqConfig');
    Route::post('update/faq/config', [FaqController::class, 'updateFaqConfig'])->name('UpdateFaqConfig');
    Route::get('view/all/faqs', [FaqController::class, 'viewAllFaqs'])->name('ViewAllFaqs');
    Route::get('add/new/faq', [FaqController::class, 'addFaq'])->name('AddFaq');
    Route::post('save/faq', [FaqController::class, 'saveFaq'])->name('SaveFaq');
    Route::get('delete/faq/{slug}', [FaqController::class, 'deleteFaq'])->name('DeleteFaq');
    Route::get('edit/faq/{slug}', [FaqController::class, 'editFaq'])->name('EditFaq');
    Route::post('update/faq', [FaqController::class, 'updateFaq'])->name('UpdateFaq');
    Route::get('rearrange/faqs', [FaqController::class, 'rearrangeFaqs'])->name('RearrangeFaqs');
    Route::post('save/rearranged/faqs', [FaqController::class, 'saveRearrangedFaqs'])->name('SaveRearrangedFaqs');

    //Instructions
    Route::get('instruction/config', [InstructionController::class, 'instructionConfig'])->name('instructionConfig');
    Route::post('update/instruction/config', [InstructionController::class, 'updateInstructionConfig'])->name('UpdateInstructionConfig');
    Route::get('view/all/instructions', [InstructionController::class, 'viewAllInstructions'])->name('ViewAllInstructions');
    Route::get('add/new/instruction', [InstructionController::class, 'addInstruction'])->name('AddInstruction');
    Route::post('save/instruction', [InstructionController::class, 'saveInstruction'])->name('SaveInstruction');
    Route::get('delete/instruction/{slug}', [InstructionController::class, 'deleteInstruction'])->name('DeleteInstruction');
    Route::get('edit/instruction/{slug}', [InstructionController::class, 'editInstruction'])->name('EditInstruction');
    Route::post('update/instruction', [InstructionController::class, 'updateInstruction'])->name('UpdateInstruction');
    Route::get('rearrange/instructions', [InstructionController::class, 'rearrangeInstructions'])->name('RearrangeInstructions');
    Route::post('save/rearranged/instructions', [InstructionController::class, 'saveRearrangedInstructions'])->name('SaveRearrangedInstructions');

    // terms and policy routes
    Route::get('terms-conditions', [TermsPolicyController::class, 'termsAndConditions'])->name('TermsAndConditions');
    Route::post('update/terms/condition', [TermsPolicyController::class, 'updateTermsAndConditions'])->name('UpdateTermsAndConditions');
    Route::get('privacy-policies', [TermsPolicyController::class, 'privacyPolicy'])->name('PrivacyPolicy');
    Route::post('update/privacy/policy', [TermsPolicyController::class, 'updatePrivacyPolicy'])->name('UpdatePrivacyPolicy');
    Route::get('refund-policies', [TermsPolicyController::class, 'refundPolicy'])->name('RefundPolicy');
    Route::post('update/refund/policy', [TermsPolicyController::class, 'updateRefundPolicy'])->name('UpdateRefundPolicy');

    // about us
    Route::get('about/us/page/title', [AboutUsController::class, 'aboutUsPageTitle'])->name('AboutUsPageTitle');
    Route::post('update/about/us/page/title', [AboutUsController::class, 'updateAboutUsPageTitle'])->name('UpdateAboutUsPageTitle');
    Route::get('about/us/page', [AboutUsController::class, 'aboutUsPage'])->name('AboutUsPage');
    Route::post('update/about/us', [AboutUsController::class, 'updateAboutUs'])->name('UpdateAboutUs');
    Route::get('delete/slider/image/{index}', [AboutUsController::class, 'deleteSliderImage'])->name('DeleteSliderImage');

    // biodatas
    Route::get('view/pending/biodatas', [ConfigController::class, 'viewPendingBiodatas'])->name('ViewPendingBiodatas');
    Route::get('view/approved/biodatas', [ConfigController::class, 'viewApprovedBiodatas'])->name('ViewApprovedBiodatas');
    Route::get('view/blocked/biodatas', [ConfigController::class, 'viewBlockedBiodatas'])->name('ViewBlockedBiodatas');
    Route::get('edit/biodata/{slug}', [ConfigController::class, 'editBiodata'])->name('EditBiodata');
    Route::post('change/biodata/status', [ConfigController::class, 'changeBiodataStatus'])->name('ChangeBiodataStatus');
    Route::get('view/biodata/visits', [ConfigController::class, 'viewBiodataVisits'])->name('ViewBiodataVisits');
    Route::get('view/biodata/likes/dislikes', [ConfigController::class, 'viewBiodataLikesDislikes'])->name('ViewBiodataLikesDislikes');
    Route::get('view/biodata/paid/views', [ConfigController::class, 'viewBiodataPaidViews'])->name('ViewBiodataPaidViews');

    // pricing package & payment histories
    Route::get('view/pricing/packages', [PricingPackageController::class, 'viewPricingPackage'])->name('ViewPricingPackage');
    Route::post('save/pricing/package', [PricingPackageController::class, 'savePricingPackage'])->name('SavePricingPackage');
    Route::get('delete/pricing/package/{slug}', [PricingPackageController::class, 'deletePricingPackage'])->name('DeletePricingPackage');
    Route::get('get/pricing/package/info/{slug}', [PricingPackageController::class, 'getPricingPackageInfo'])->name('GetPricingPackageInfo');
    Route::post('update/pricing/package', [PricingPackageController::class, 'updatePricingPackageInfo'])->name('UpdatePricingPackageInfo');
    Route::get('rearrange/pricing/packages', [PricingPackageController::class, 'rearrangePricingPackages'])->name('RearrangePricingPackages');
    Route::post('save/rearranged/pricing/packages', [PricingPackageController::class, 'saveRearrangedPricingPackages'])->name('SaveRearrangedPricingPackages');
    Route::get('view/payment/histories', [PricingPackageController::class, 'viewPaymentHistories'])->name('ViewPaymentHistories');

});

// linking other Routes
require 'config.php';
require 'userRolePermission.php';
require 'frontend.php';
