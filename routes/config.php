<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\QuestionController;


// Route::get('/link', function () {
    // echo $_SERVER['DOCUMENT_ROOT'];
    // exit();
    // $target = '/home/public_html/storage/app/public';
    // $shortcut = '/home/public_html/public/storage';
    // symlink($target, $shortcut);
    // return "Storage link!";
// });


// backend routes
Route::group(['middleware' => ['auth', 'CheckUserType']], function () {

    // file manager routes start
    Route::get('/file-manager', function () {
        return view('backend.file_manager');
    })->middleware(['auth']);

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    // file manager routes end


    Route::get('ckeditor', [CkeditorController::class, 'index']);
    Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


    // class config routes
    Route::get('language/page', [ConfigController::class, 'languagePage'])->name('LanguagePage');
    Route::get('set/default/language/{code}/{value}', [ConfigController::class, 'setDefaultLanguage'])->name('SetDefaultLanguage');

    // BioDataType
    Route::get('view/all/biodatatype', [ConfigController::class, 'viewAllBiodataType'])->name('ViewAllBiodataType');
    Route::post('add/new/biodatatype', [ConfigController::class, 'addNewBiodataType'])->name('AddNewBiodataType');
    Route::get('delete/biodatatype/{id}', [ConfigController::class, 'deleteBiodataType'])->name('DeleteBiodataType');
    Route::get('get/biodatatype/{id}', [ConfigController::class, 'biodataType'])->name('BiodataType');
    Route::post('update/biodatatype', [ConfigController::class, 'updateBiodataType'])->name('UpdateBiodataType');
    Route::get('rearrange/biodatatype', [ConfigController::class, 'rearrangeBiodataType'])->name('RearrangeBiodataType');
    Route::post('save/rearranged/biodatatype', [ConfigController::class, 'saveRearrangeBiodataType'])->name('SaveRearrangeBiodataType');

    // Marital Condition
    Route::get('view/all/marital/condition', [ConfigController::class, 'viewAllMaritalCondition'])->name('ViewAllMaritalCondition');
    Route::post('add/new/marital/condition', [ConfigController::class, 'addNewMaritalCondition'])->name('AddNewMaritalCondition');
    Route::get('delete/marital/condition/{id}', [ConfigController::class, 'deleteMaritalCondition'])->name('DeleteMaritalCondition');
    Route::get('get/marital/condition/{id}', [ConfigController::class, 'maritalCondition'])->name('MaritalCondition');
    Route::post('update/marital/condition', [ConfigController::class, 'updateMaritalCondition'])->name('UpdateMaritalCondition');
    Route::get('rearrange/marital/condition', [ConfigController::class, 'rearrangeMaritalCondition'])->name('RearrangeMaritalCondition');
    Route::post('save/rearranged/marital/condition', [ConfigController::class, 'saveRearrangeMaritalCondition'])->name('SaveRearrangeMaritalCondition');

    // Question Set
    Route::get('view/all/question/set', [ConfigController::class, 'viewAllQuestionSets'])->name('ViewAllQuestionSets');
    Route::post('add/new/question/set', [ConfigController::class, 'addNewQuestionSet'])->name('AddNewQuestionSet');
    Route::get('delete/question/set/{id}', [ConfigController::class, 'deleteQuestionSet'])->name('DeleteQuestionSet');
    Route::get('get/question/set/{id}', [ConfigController::class, 'questionSet'])->name('QuestionSet');
    Route::post('update/question/set', [ConfigController::class, 'updateQuestionSet'])->name('UpdateQuestionSet');
    Route::get('rearrange/question/set', [ConfigController::class, 'rearrangeQuestionSet'])->name('RearrangeQuestionSet');
    Route::post('save/rearranged/question/set', [ConfigController::class, 'saveRearrangeQuestionSet'])->name('SaveRearrangeQuestionSet');

    // Questions
    Route::get('view/all/questions', [QuestionController::class, 'viewAllQuestions'])->name('ViewAllQuestions');
    Route::get('create/question', [QuestionController::class, 'createQuestion'])->name('CreateQuestion');
    Route::post('save/new/question', [QuestionController::class, 'saveNewQuestion'])->name('SaveNewQuestion');
    Route::get('edit/question/{slug}', [QuestionController::class, 'editQuestion'])->name('EditQuestion');
    Route::post('update/question', [QuestionController::class, 'updateQuestionInfo'])->name('UpdateQuestionInfo');
    Route::get('get/question/{id}', [QuestionController::class, 'getQuestionInfo'])->name('GetQuestionInfo');
    Route::get('delete/question/{id}', [QuestionController::class, 'deleteQuestion'])->name('DeleteQuestion');
    Route::get('rearrange/questions', [QuestionController::class, 'rearrangeQuestions'])->name('RearrangeQuestions');
    Route::post('save/rearranged/questions', [QuestionController::class, 'saveRearrangedQuestions'])->name('SaveRearrangedQuestions');




});
