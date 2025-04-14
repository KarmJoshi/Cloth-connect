<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogisticsController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminCtaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSession;
use App\Http\Middleware\CheckSessionNgo;
use App\Http\Middleware\CheckSessionLogistics;
use App\Http\Middleware\PickupDate;

//logout Route

Route::get("logout",[AuthController::class,"logout"]);

//Landing Page Route

Route::view("/","landingpage");

//Login Page Route 

Route::view('login','login');
Route::post('login',[AuthController::class,'login'])->name('login');

//user - Register Page Route

Route::view('register-user','register-user');
Route::post('register-user',[UserController::class,'register']);

//Ngo - Register Page Route

Route::view('register-NGO','register-NGO');
Route::post('register-NGO',[NgoController::class,'register']);

//Logistics - Register Page Route

Route::view('register-logistics','register-logistics');
Route::post('register-logistics',[LogisticsController::class,'register']);

//Forget Password Routes

Route::view('forgetPassword','forget_password');
Route::post('forgetPassword',[AuthController::class,'sendOtp']);
Route::view('otp-verification','otp_verification');
Route::post('otp-verification',[AuthController::class,'otpVerification']);
Route::post('password-reset',[AuthController::class,'passwordReset']);

//User Routes 

Route::get('user-homepage',[UserController::class,'homePage'])->middleware(CheckSession::class);
Route::view('user-donation','user_donation')->middleware(CheckSession::class);
Route::post('user-donation',[UserController::class,'donation'])->middleware(CheckSession::class);
Route::get('user-profile',[UserController::class,'viewuser']);//->middleware(CheckSession::class);
Route::post('user-profile',[UserController::class,'updateuser'])->middleware(CheckSession::class);

//NGO Page Routes 

Route::view('ngo-homepage','ngo_homepage')->middleware(CheckSessionNgo::class);
Route::get('ngo-homepage',[NgoController::class,'homepage'])->middleware(CheckSessionNgo::class);
Route::post('ngo-homepage/{UDID}',[NgoController::class,'addtocart'])->middleware(CheckSessionNgo::class);
Route::get('ngo-profile',[NgoController::class,'viewuser'])->middleware(CheckSessionNgo::class);
Route::post('ngo-profile',[NgoController::class,'updateuser'])->middleware(CheckSessionNgo::class);
Route::get('ngo-cart',[NgoController::class,'cart'])->middleware(CheckSessionNgo::class);
Route::get('remove/{UDID}',[NgoController::class,'remove']);
Route::get('request/{UDID}',[NgoController::class,'request']);
Route::get('ngo-orders',[NgoController::class,'orders'])->middleware(CheckSessionNgo::class);

//Logistics Page Routes

Route::get('logistics-homepage',[LogisticsController::class,'delivery'])->name('logistics.homepage')->middleware(CheckSessionLogistics::class);
Route::get('logistics-profile',[LogisticsController::class,'viewuser'])->middleware(CheckSessionLogistics::class);
Route::post('logistics-profile',[LogisticsController::class,'updateuser'])->middleware(CheckSessionLogistics::class);
Route::post('pickup-time',[LogisticsController::class,'pickup_time'])->middleware(CheckSessionLogistics::class)->middleware(PickupDate::class);
Route::get('status-done/{DID}',[LogisticsController::class,'done'])->middleware(CheckSessionLogistics::class);
Route::get('delivery-history',[LogisticsController::class,'history'])->middleware(CheckSessionLogistics::class);

//Admin Route

Route::view('admin_homepage','admin-homepage');
Route::view('admin-register','admin_register');
Route::get('admin-homepage',[AdminController::class,'approval']);
Route::get('approved/{NID}',[AdminController::class,'approved']);
Route::post('admin-register',[AdminController::class,'register']);
Route::get('admin-donar-list',[AdminController::class,'donorlist']);
Route::get('edit-donor/{CID}',[AdminController::class,'list']);
Route::post('edit-donor/{CID}',[AdminController::class,'edit']);
Route::get('delete-donor/{CID}',[AdminController::class,'delete']);
Route::get('admin-NGO-list',[AdminController::class,'NGO_list']);
Route::get('admin-ngo-edit/{NID}',[AdminController::class,'NGO_form_list']);
Route::post('admin-ngo-edit/{NID}',[AdminController::class,'NGO_edit']);
Route::get('admin-ngo-delete/{NID}',[AdminController::class,'NGO_delete']);
Route::get('admin-logistics-list',[AdminController::class,'logistics_list']);
Route::get('admin-logistics-edit/{LID}',[AdminController::class,'logistics_form_list']);
Route::post('admin-logistics-edit/{LID}',[AdminController::class,'logistics_edit']);
Route::get('admin-logistics-delete/{LID}',[AdminController::class,'logistics_delete']);