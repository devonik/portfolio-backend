<?php


namespace App\Http\Controllers\Api;


use App\Models\Career;

class CareersController
{
    public function get(){
        $careers = Career::all();
        foreach ($careers as $career){
            $career['icon'] = $career->icon;
        }
        return $careers;
    }
}
