<?php
namespace App\Repository;

use App\RepositoryContracts\IServingRepository;
use Illuminate\Support\Facades\DB;

class ServingRepository implements IServingRepository{
    public function PickServing($idServing){
        $serving = DB::table('servings')->where('id',$idServing)->first();
        return $serving;
    }


}