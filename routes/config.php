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
    // Route::get('view/all/class', [ConfigController::class, 'viewAllClass'])->name('ViewAllClass');
    // Route::post('add/new/class', [ConfigController::class, 'addNewClass'])->name('AddNewClass');
    // Route::get('delete/class/{slug}', [ConfigController::class, 'deleteClass'])->name('DeleteClass');
    // Route::get('get/class/info/{slug}', [ConfigController::class, 'classInfo'])->name('ClassInfo');
    // Route::post('update/class/info', [ConfigController::class, 'updateClassInfo'])->name('UpdateClassInfo');
    // Route::get('rearrange/class', [ConfigController::class, 'rearrangeClass'])->name('RearrangeClass');
    // Route::post('save/rearranged/class', [ConfigController::class, 'saveRearrangeClass'])->name('SaveRearrangeClass');



});
