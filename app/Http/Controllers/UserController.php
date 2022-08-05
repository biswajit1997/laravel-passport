<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use HasApiTokens;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
class UserController extends Controller
{
    public function register(Request $request){
        
        $response = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        if($response){
            return response()->json([
                'massage'=>'successfully registered'
            ]);
        }else{
            return response()->json([
                'massage'=>'faild'
            ]);  
        }
    }

    public function login(Request $request){
       
       
        $user=  User::where([
            'email'=>$request->email,
            'password'=> Hash::check('plain-text', $request->password)
        ])->first();
        if($user){
            $success['token'] = $user->createToken('apitoken')->accessToken;
            return response()->json([
                'token'=> $success['token'],
                'user'=>$user
            ]);
        }else{
            return response()->json([
                'massage'=>'login faild'
            ]);
        }
    }

    public function logout(Request $request){


        //current token expiry
            // Auth::user()->token()->delete();
            // return response()->json([
            //     'message' => 'Successfully logged out'
            // ]);

        //all token expiry
            // Auth::user()->token()->revoke();
            // return response()->json([
            //     'message' => 'Successfully logged out'
            // ]);


        //current token delete
            $res = Auth::user()->token()->delete();
            if($res){
                return response()->json([
                    'massage'=>'logout'
                ]);
            }else{
                return response()->json([
                    'massage'=>'logout faild'
                ]);  
            }

        //all token delete
            // $res = Auth::user()->tokens->each(function($token,$key){
            //     $token->delete();
            // });
            // if($res){
            //     return 'logout';
            // }else{
            //     return 'faild';
            // }
        
    }
    public function data(){
        $userData = Auth::user();
        return response()->json([
            'userData'=>$userData
        ]);
        
    }
    public function error(){
        return response()->json([
            'massage'=> 'token expiry'
        ]);
    }
}
