<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function RegisterUser(Request $req){
        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->save();
        return $user;
    }

    function LoginUser(Request $req){
        $user= User::where('email',$req->email)->first();
        if(!$user)
        {
            echo '<script>alert("no user found")</script>';
            redirect()->route('/register');
            return ["error"=>"no user found"];    
        } 
        else if (!Hash::check($req->password, $user->password)) 
        {
            echo '<script>alert("password incorrect")</script>';
            redirect()->route('/login'); 
            return ["error"=>"password incorrect"];     
        } 
        else 
        {
            return $user;
        }
        
    }
    
}
