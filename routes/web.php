<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


route::get('/', [AuthController::class, 'home'])->name('home');

route::group(['middleware' => 'guest'], function () {

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/registerpost', [AuthController::class, 'registerpost'])->name('registerpost');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');

});

route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'alldata'])->name('alldata');
    Route::delete('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::get('/addUser', [HomeController::class, 'addUser'])->name('addUser');
    Route::post('/addUserData', [HomeController::class, 'addUserData'])->name('addUserData');

    route::get('view/{id}', [HomeController::class, 'viewData'])->name('viewData');

    route::get('updet/{id}', [HomeController::class, 'updetData'])->name('updetData');
    Route::put('/updetUserData/{id}', [HomeController::class, 'updetUserData'])->name('updetUserData');

    route::get('/delete/{id}', [HomeController::class, 'deleteData'])->name('deleteData');


});