<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FaqController;


// backend routes
Route::group(['middleware' => ['auth', 'CheckUserType']], function () {

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


    // Route::get('view/all/class', [ConfigController::class, 'viewAllClass'])->name('ViewAllClass');
    // Route::post('add/new/class', [ConfigController::class, 'addNewClass'])->name('AddNewClass');
    // Route::get('delete/class/{slug}', [ConfigController::class, 'deleteClass'])->name('DeleteClass');
    // Route::get('get/class/info/{slug}', [ConfigController::class, 'classInfo'])->name('ClassInfo');
    // Route::post('update/class/info', [ConfigController::class, 'updateClassInfo'])->name('UpdateClassInfo');
    // Route::get('rearrange/class', [ConfigController::class, 'rearrangeClass'])->name('RearrangeClass');
    // Route::post('save/rearranged/class', [ConfigController::class, 'saveRearrangeClass'])->name('SaveRearrangeClass');



});
