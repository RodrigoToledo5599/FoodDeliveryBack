<?php

namespace App\Services\Home;

use App\Repository\Auth\LoginRepository;
use App\Repository\ServingRepository;


class HomeServices{
    protected $_servingRepo;
    protected $_loginRepo;
    function __construct(LoginRepository $loginRepo,
                         ServingRepository $servingRepo){
        $this->_loginRepo = $loginRepo;
        $this->_servingRepo = $servingRepo;
        
    }



    public function LoadHomePageService(string $email, string $password){
        $token = $this->_loginRepo->GenerateToken($email,$password);
        $servings = $this->_servingRepo->GetAllServings();
        return [
            "token" => $token,
            "servings" => $servings
        ];
    }


}
