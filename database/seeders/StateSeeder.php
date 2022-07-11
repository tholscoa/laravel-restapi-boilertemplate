<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state_list['Nigeria'] = [
            ["name" => "Niger State"],
            ["name" => "Borno State"],
            ["name" => "Taraba State"],
            ["name" => "Kaduna State"],
            ["name" => "Bauchi State"],
            ["name" => "Yobe State"],
            ["name" => "Zamfara State"],
            ["name" => "Adamawa State"],
            ["name" => "Kwara State"],
            ["name" => "Kebbi State"],
            ["name" => "Benue State"],
            ["name" => "Plateau State"],
            ["name" => "Kogi State"],
            ["name" => "Oyo State"],
            ["name" => "Nasarawa State"],
            ["name" => "Sokoto State"],
            ["name" => "Katsina State"],
            ["name" => "Jigawa State"],
            ["name" => "Cross River State"],
            ["name" => "Kano State"],
            ["name" => "Gombe State"],
            ["name" => "Edo State"],
            ["name" => "Delta State"],
            ["name" => "Ogun State"],
            ["name" => "Ondo State"],
            ["name" => "Rivers State"],
            ["name" => "Bayelsa State"],
            ["name" => "Osun State"],
            ["name" => "Federal Capital Territory"],
            ["name" => "Enugu State"],
            ["name" => "Akwa Ibom State"],
            ["name" => "Ekiti State"],
            ["name" => "Abia State"],
            ["name" => "Ebonyi State"],
            ["name" => "Imo State"],
            ["name" => "Anambra State"],
            ["name" => "Lagos State"]
        ];


        foreach($state_list as $country => $states){
            $country_id = self::getCountryCode($country);
            foreach($states as $state){
                $state['country_id']=$country_id;
                State::updateOrCreate($state);
            }
        }
    }

    public static function getCountryCode($name){
        return Country::whereName($name)->first()->id;
    }
}
