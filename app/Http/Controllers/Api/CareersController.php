<?php


namespace App\Http\Controllers\Api;


use App\Models\Career;

class CareersController
{
    public function get(){
        $careers = Career::all();
        foreach ($careers as $career){
            $career['icon123'] = $career->icon;
        }
        return $careers;
    }
}
