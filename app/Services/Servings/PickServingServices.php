<?php

namespace App\Services\Servings;

use App\Repository\ServingRepository;


class PickServingServices{

    protected $_servingRepo;
    function __construct(ServingRepository $servingRepo){
        $this->_servingRepo = $servingRepo;
    }


    public function PickServingService($idServing){
        $serving = $this->_servingRepo->PickServing($idServing);
        return $serving;
    }

    public function ChoosePedidoService($idServing,$idUser){
        
    }
}
