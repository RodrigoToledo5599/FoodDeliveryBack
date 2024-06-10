<?php

namespace App\Http\Controllers;



use App\Services\Home\HomeServices;
use App\Services\Servings\PickServingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;





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
        return $this->_homeServices->LoadHomePageService();
    }

    public function PickAServing($idServing){
        Log::debug('Hello, World!');
        return $this->_pickServingServices->PickServingService($idServing);
    }
}
