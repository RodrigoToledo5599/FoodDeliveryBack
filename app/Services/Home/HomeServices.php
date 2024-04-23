<?php

namespace App\Services\Home;


use Illuminate\Support\Facades\DB;


class HomeServices{



    public function LoadHomePageService(){
        $servings = DB::table('servings')->get();
        return $servings;
    }


}
