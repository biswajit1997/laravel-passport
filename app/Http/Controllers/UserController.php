<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required',
        //     'password' => [
        //         'required',
        //         'string',
        //         'min:10',             // must be at least 10 characters in length
        //         'regex:/[a-z]/',      // must contain at least one lowercase letter
        //         'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //         'regex:/[0-9]/',      // must contain at least one digit
        //         'regex:/[@$!%*#?&]/', // must contain a special character
        //     ],
        // ]);
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
       
        // if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
        //     $user = Auth::user();
            
         
        //     $success['token'] = $user->createToken('myApp')->accessToken;
        //    return   $success['token'];
            
        // }
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
}
