<?php
namespace App\Repository\Auth;

use Auth;


class LoginRepository{


    public function GenerateToken($email,$password){
        if (Auth::attempt(["email" => $email, "password" => $password])) {
            $user = Auth::user();
            $token = $user->createToken('MyAppToken')->accessToken;
            return ["token"=>$token];
        }
        else{
            return [$email];
        }
    }

    // public function







}
