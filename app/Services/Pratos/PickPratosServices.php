<?php

namespace App\Services\Pratos;

use App\Repository\PratosRepository;


class PickPratosServices{

    protected $_pratosRepo;
    function __construct(PratosRepository $pratosRepo){
        $this->_pratosRepo = $pratosRepo;
    }


    public function PickPratosService($idPratos){
        $pratos = $this->_pratosRepo->PickPratos($idPratos);
        return $pratos;
    }

    public function ChoosePedidoService($idPratos,$idUser){
        
    }
}
