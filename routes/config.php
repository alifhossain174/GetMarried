<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CkeditorController;


// backend routes
Route::group(['middleware' => ['auth', 'CheckUserType']], function () {

    // Route::get('/link', function () {
        // echo $_SERVER['DOCUMENT_ROOT'];
        // exit();
        // $target = '/home/public_html/storage/app/public';
        // $shortcut = '/home/public_html/public/storage';
        // symlink($target, $shortcut);

        // return "Storage link!";
    // });


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




});
