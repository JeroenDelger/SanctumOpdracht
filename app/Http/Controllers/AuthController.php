<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\LoggedInUserResource;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests\LoginRequest;
// use PHPOpenSourceSaver\JWTAuth\JWTGuard;

class AuthController extends Controller
{
   private const COOKIE_NAME = 'Authorization';

//    private JWTGuard $guard;

    /**
     * Construct a new controller
     *
     * @param Guard $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param LoginUser $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

         if(Auth::attempt(['email' => $validated["email"], 'password' => $validated["password"]])){ 
            return Auth::user(); 
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    
    public function me()
    {
    // dd(Auth::user());
       return Auth::user(); 
    }
}
