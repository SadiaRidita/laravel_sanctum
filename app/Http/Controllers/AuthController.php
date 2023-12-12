<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Http\Controllers\AuthController;


// Import Response from Illuminate\Http

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid Credentials'
            ], ResponseAlias::HTTP_UNAUTHORIZED); // Fix: Use Response::HTTP_UNAUTHORIZED
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => 'Success'
       ])->withCookie($cookie);
        //return $user;
    }
//
//        $user = Auth::user();

//        $cookie = cookie('jwt', $token, 60 * 24);
//
//        return response([
//            'message' => 'Success'
//        ])->withCookie($cookie);
//
//        // The following return statement will not be reached
//        // return $user;
//    }


    public function user(): string
    {
        $user = Auth::user();
        return "authenticated";


    }
    public function logout(Request $request): \Illuminate\Foundation\Application|Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logout successful'
        ])->withCookie(cookie()->forget('jwt'));
    }

}
