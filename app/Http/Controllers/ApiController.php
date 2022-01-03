<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    // public function index(){
    //     return view('auth/register');
    // }
    
    // public function register(Request $request){
    //   $email =  User::where('email',$request->email)->value('email');
    //   if(!$email){
    //     User::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>Hash::make($request->password)
    //     ]);
    //     return redirect('login');
    //   }else{
    //     return redirect()->back() ;
    //   }

    // }
    public function login(Request $request){
        

        $credentials = request(['email', 'password']);
   
       
        if(!Auth::attempt($credentials)){
            return response()->json([
                'errors' => [
                    'email' => ['could not sign you in with those credentials']
                ]
            ], 422);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if($token){
            return response()->json([
                'token'=>$tokenResult,
                'user'=>$user,
            ]);
        }else{
            return response()->json([

                'error'=>true,
            ]);
        }
       

        
    }


    // public function home(Request $request){



    //     return view('home');
        
    // }
    public function logout(Request $request)
    {
    //  $res =   Auth::user()->tokens->each(function($token, $key) {
    //     $token->delete();
    // });
    // if($res){
    //     Cookie::queue(Cookie::forget('passport_auth_session'));
    //     return redirect('/');
    // }else{
    //     return redirect('/home');
    // }
    
        }
}