<?php

namespace App\Http\Services;

use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Log;

class LocationService 
{
    public static function getAllCountries(){
        return Country::whereIsActive(true)->get();
    }

    // public static function getCountryStates($country_id){
    //     return State::whereIsActive(true)->whereCountryId($country_id)->get();
    // }

    public static function getSpecificCountry($country_id){
        return Country::whereIsActive(true)->whereId($country_id)->first();
    }

    public static function getSpecificState($state_id){
        return State::whereIsActive(true)->whereId($state_id)->first();
    }
}
