<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    public function store(StoreRegisterRequest $request){
        $register = User::create($request->validated());
        $register = User::all();
        return UserResource::collection($register);
    }
}
