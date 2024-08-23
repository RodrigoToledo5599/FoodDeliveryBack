<?php

namespace App\Services\Servings;

use App\Repository\ServingRepository;
use Illuminate\Support\Facades\Log;

class PickServingServices{

    protected $_servingRepo;
    function __construct(ServingRepository $servingRepo){
        $this->_servingRepo = $servingRepo;
    }


    public function PickServingService($idServing){
        $serving = $this->_servingRepo->PickServing($idServing);
        if($serving == null){
            Log::error('Serving not found');
            return "null e.e";
        }
        Log::warning("CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC, " . $serving->Name);
        return $serving;
    }

    public function ChoosePedidoService($idServing,$idUser){
        
    }
}
