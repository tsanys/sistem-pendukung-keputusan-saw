<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [MainController::class, 'index']);
    Route::get('/apps', [MainController::class, 'apps']);
    Route::post('/make-app', [DashboardController::class, 'makeApp']);
    Route::put('/edit-app/{id}', [DashboardController::class, 'editApp']);
    Route::get('/app/{id}', [MainController::class, 'app'])->name('app');
    Route::delete('/app/{id}', [MainController::class, 'deleteApp'])->name('deleteApp');

    //alternatives
    Route::get('/alternatives/{id}', [MainController::class, 'alternatives'])->name('alternatives');
    Route::post('/alternative/{id}', [DashboardController::class, 'addAlternative'])->name('addAlternative');
    Route::put('/alternative/{id}', [DashboardController::class, 'editAlternative'])->name('editAlternative');
    Route::delete('/alternative/{id}', [DashboardController::class, 'deleteAlternative'])->name('deleteAlternative');

    //criterias
    Route::get('/criterias/{id}', [MainController::class, 'criterias'])->name('criterias');
    Route::post('/criteria/{id}', [DashboardController::class, 'addCriteria'])->name('addCriteria');
    Route::put('/criteria/{id}', [DashboardController::class, 'editCriteria'])->name('editCriteria');
    Route::delete('/criteria/{id}', [DashboardController::class, 'deleteCriteria'])->name('deleteCriteria');

    //evaluation
    Route::get('/evaluation/{id}', [MainController::class, 'evaluation']);
});
