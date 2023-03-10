<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)    
    {

        $users = User::where('email',$request->email)->where('password',$request->password)->get(); 

        if(count($users)>0){
            
            Auth::loginUsingId($users[0]['id']);

            $user = Auth::user();
            $token = $user -> createToken('token');

            Auth::logout();

            //return response()->json($token->plainTextToken);  
            return response()->json(['data'=>[
                'token'=> $token->plainTextToken,
                'code'=>200]]);  
        }
        else{
            return response()->json(['data'=>[
                                        'message'=>'Unauthorized',
                                        'code'=>401]]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['data'=>[
            'message'=>'logout',
            'code'=>200]]);
    }    
    

}
