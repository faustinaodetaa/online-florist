<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'login'], function() {
//Home
    Route::get('/', [FlowerController::class, 'index']);


//Flower
    Route::get('/manageflower', [FlowerController::class, 'manageFlower']);

    Route::get('/flower/insert', [FlowerController::class, 'insertFlowerPage']);
    Route::post('/flower/insert', [FlowerController::class, 'insertFlower']);

    Route::get('/flower/update/{id}', [FlowerController::class, 'updateFlowerPage']);
    Route::post('/flower/update/{id}', [FlowerController::class, 'updateFlower']);

    Route::get('/flower/delete/{id}', [FlowerController::class, 'deleteFlower']);

    Route::get('/flower/detail/{id}', [FlowerController::class, 'detailFlowerPage']);


//Flowertype
    Route::get('/manageflowertype', [FlowertypeController::class, 'manageFlowertype']);

    Route::get('/flowertype/insert', [FlowertypeController::class, 'insertFlowertypePage']);
    Route::post('/flowertype/insert', [FlowertypeController::class, 'insertFlowertype']);

    Route::get('/flowertype/update/{id}', [FlowertypeController::class, 'updateFlowertypePage']);
    Route::post('/flowertype/update/{id}', [FlowertypeController::class, 'updateFlowertype']);

    Route::get('/flowertype/delete/{id}', [FlowertypeController::class, 'deleteFlowertype']);


//Courier
    Route::get('/managecourier', [CourierController::class, 'manageCourier']);

    Route::get('/courier/insert', [CourierController::class, 'insertCourierPage']);
    Route::post('/courier/insert', [CourierController::class, 'insertCourier']);

    Route::get('/courier/update/{id}', [CourierController::class, 'updateCourierPage']);
    Route::post('/courier/update/{id}', [CourierController::class, 'updateCourier']);

    Route::get('/courier/delete/{id}', [CourierController::class, 'deleteCourier']);


//Profile
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update/{id}', [UserController::class, 'updateProfile']);


//User
    Route::get('/manageuser', [UserController::class, 'manageUser']);

    Route::get('/user/update/{id}', [UserController::class, 'updateUserPage']);
    Route::post('/user/update/{id}', [UserController::class, 'updateUser']);

    Route::get('/user/delete/{id}', [UserController::class, 'deleteUser']);


//Cart
    Route::get('/cart', [CartController::class, 'cartPage']);
    Route::post('/cart/checkout', [CartController::class, 'checkout']);

    Route::get('/cart/delete/{id}', [CartController::class, 'deleteCart']);

    Route::post('/flower/addtocart/{id}', [CartController::class, 'addToCart']);
    Route::post('/flower/order/{id}', [CartController::class, 'order']);


//History
    Route::get('/history', [TransactionController::class, 'history']);


//Logout
    Route::get('/logout', [UserController::class, 'logout']);

});


Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);
