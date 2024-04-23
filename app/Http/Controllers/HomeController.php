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


    public function LoadHomePage(){
        return $this->_homeServices->LoadHomePageService();
    }

    public function PickAServing(Request $request,$idServing){
        return $this->_pickServingServices->PickServingService($request,$idServing);
    }
}
