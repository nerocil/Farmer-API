<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\VersionOne\DashboardController;
use App\Http\Controllers\VersionOne\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DashboardController::class)->prefix('dashboard')->group(function (){
    Route::get('/','dashboard')->name('dashboard');
});

Route::controller(GroupController::class)->prefix('group')->group(function (){
    Route::get('/','index')->name('group.index');
    Route::get('group_avatars/{profile_icon}','index')->name('group.avatar');
});
Route::post('/login',[AuthenticationController::class,'onUserAttemptLogin'])->name('login');
Route::post('/logout',[AuthenticationController::class,'onUserAttemptLogout'])->name('logout')->middleware('auth:sanctum');
