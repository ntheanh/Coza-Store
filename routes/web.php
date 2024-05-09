<?php

use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('admin/users/login',[LoginController::class,'index']);
Route::post('admin/users/login/store',[LoginController::class,'store']);