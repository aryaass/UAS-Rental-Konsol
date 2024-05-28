<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestingDev;
use Illuminate\Support\Facades\Route;

// HOME 
Route::get('/', [HomeController::class,'home']);
Route::get('/register',[HomeController::class,'register']);
Route::post('/registerValidity',[HomeController::class,'registerValidity']);
Route::get('/login',[HomeController::class,'login']);
Route::post('/loginValidity',[HomeController::class,'loginValidity']);
Route::get('/logout',[HomeController::class, 'logout']);
Route::get('/captcha',[HomeController::class, 'captcha']);

// CONSOLE
Route::get('/console/shoppingCart',[ConsoleController::class,'shoppingCart']);
Route::get('/console/addToCart/{id}',[ConsoleController::class,'addToCart']);

// FORBIDDEN
Route::view('/notAdmin','forbidden.notAdmin');
Route::view('/notLoggedIn','forbidden.notLoggedIn');
Route::view('/adminCannotOrder','forbidden.adminCannotOrder');

// MIDDLEWARE GROUP ADMIN
Route::group(['middleware'=>['adminProtectedPage']], function(){

    // ADMIN HOME
    Route::get('/admin',[AdminController::class,'home']);

    // ADMIN CRUD CONSOLES
    Route::get('/admin/consoles',[AdminController::class,'consoles']);
    Route::get('/admin/consoles/delete/{id}',[AdminController::class,'delete']);
    Route::get('/admin/consoles/details/{id}',[AdminController::class,'details']);
    Route::get('/admin/consoles/insert',[AdminController::class,'insert']);
    Route::post('/admin/consoles/insertValidity',[AdminController::class,'insertValidity']);
    Route::get('/admin/consoles/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/consoles/editValidity',[AdminController::class,'editValidity']);

    // ADMIN ORDERS
    Route::get('/admin/orders',[AdminController::class,'orders']);
    Route::get('/admin/orders/action/{id}',[AdminController::class,'action']);
    Route::post('/admin/orders/actionValidity',[AdminController::class,'actionValidity']);
});

// MIDDLEWARE GROUP CUSTOMER
Route::group(['middleware'=>['customerProtectedPage']], function(){

    // CONSOLE
    Route::post('/console/order',[ConsoleController::class,'order']);
    Route::get('/console/history',[ConsoleController::class,'history']);
});

// TESTING DEV TOOLS
Route::get('/testing',[TestingDev::class,'testing']);
Route::get('/clearCart',[TestingDev::class,'clearCart']);
Route::get('/clearSession',[TestingDev::class,'clearSession']);
Route::get('/getSession',[TestingDev::class,'getSession']);
Route::get('/decrement',[TestingDev::class,'decrement']);
Route::get('/dbConnect',[TestingDev::class,'dbConnect']);
Route::get('/sessionArray',[TestingDev::class,'sessionArray']);

