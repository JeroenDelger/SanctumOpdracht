<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
// use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controller\UserController;
use App\Http\Middleware\Auth;
use App\Http\Controllers\AuthController;
Route::group(['middleware' => ['web']], function () {


    Route::view('/', 'welcome' );
    // Route::view('/register', function(){
    //     if(Auth::check()){
    //         return redirect()->route('user');
    //     }
    //     else return view('register')
    // })

    // Route::get('/user/{id}' , [UserController::class, 'getUser'], function(Request $request) {//Is controller nodig?
    //     return $request->user();
    // })->middleware('auth:sanctum');


    Route::post('/register', [RegisterController::class, 'store']);
    // Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('login', [AuthController::class, 'login']);


    Route::get('/logout');
    Route::post('/logout', [LogoutController::class, 'logout']);
    
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
    
     });
    
});

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('news');
    }

    return view('welcome');
})->name('home');