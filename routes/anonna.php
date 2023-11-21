<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InstructionController;


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

});
