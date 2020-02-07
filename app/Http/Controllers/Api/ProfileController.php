<?php


namespace App\Http\Controllers\Api;


use App\Models\Career;
use App\Models\Profile;

class ProfileController
{
    public function get(){
        $profile = Profile::query()->first();
        $profile['icons'] = $profile->icons;
        return $profile;
    }
}
