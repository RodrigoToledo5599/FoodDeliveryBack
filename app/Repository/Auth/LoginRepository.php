<?php
namespace App\Repository\Auth;

use App\RepositoryContracts\Auth\ILoginRepository;
use Auth;


class LoginRepository implements ILoginRepository{


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








}
