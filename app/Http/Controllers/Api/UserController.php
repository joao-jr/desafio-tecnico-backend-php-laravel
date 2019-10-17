<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	$credentials = $request->only('email', 'password');
    	$token =null;

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if( is_null(Auth()->user()->api_token) ) {
            	$token = Str::random(60);
            	Auth()->user()->api_token = hash('sha256', $token);
            	Auth()->user()->save();
            }
            return response()->json(['user' => Auth()->user(), 'token' => $token], 200);
        } else {
        	return response()->json(['message' => 'Dados inválidos'], 401);
        }
    }
}
