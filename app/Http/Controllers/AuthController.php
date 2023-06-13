<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->password);
        $user->save();
        return response()->json([
            "data" => "Success",
        ],200);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Login Fail!',
            ],422);
        }
        else{
            $user = User::where('email',$request->email)->first();
            $token = $user->createToken('user-auth')->plainTextToken;
            return response()->json([
                "data" => $user,
                "token" => $token,
            ],200);
        }
    }

}
