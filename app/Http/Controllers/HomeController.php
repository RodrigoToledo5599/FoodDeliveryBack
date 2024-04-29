<?php

namespace App\Http\Controllers;



use App\Services\Home\HomeServices;
use App\Services\Servings\PickServingServices;
use Illuminate\Http\Request;





class HomeController extends Controller
{
    protected $_homeServices;
    protected $_pickServingServices;
    function __construct(
        HomeServices $homeServices,
        PickServingServices $pickServingServices
    ){
        $this->_homeServices = $homeServices;
        $this->_pickServingServices = $pickServingServices;
    }


    public function LoadHomePage(Request $request){
        $email = $request["email"];
        $password = $request["password"];
        return $this->_homeServices->LoadHomePageService($email,$password);
    }

    public function PickAServing($idServing){
        return $this->_pickServingServices->PickServingService($idServing);
    }
}
