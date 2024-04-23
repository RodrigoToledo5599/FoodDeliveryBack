<?php

namespace App\Services\Servings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PickServingServices{

    public function PickServingService($idServing){
        $serving = DB::table('servings')->where('id',$idServing)->first();
        return $serving;
    }

}
