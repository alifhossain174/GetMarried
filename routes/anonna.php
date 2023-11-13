<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


// backend routes
Route::group(['middleware' => ['auth', 'CheckUserType']], function () {



});
