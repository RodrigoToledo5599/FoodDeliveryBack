<?php 
namespace App\RepositoryContracts;


interface IServingRepository{
    public function PickServing($idServing);
    public function GetAllServings();
}