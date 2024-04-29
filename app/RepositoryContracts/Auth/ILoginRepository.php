<?php


namespace App\RepositoryContracts\Auth;


interface ILoginRepository{

    public function GenerateToken($email,$password);
    public function ChoosePedidoService($idServing,$idUser);



}