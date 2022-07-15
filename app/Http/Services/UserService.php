<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService 
{
    public static function register($full_name, $username, $email, $phone, $city_id, $state_id, $country_id, $password){
        $user = new User();
        $user->fullname = trim($full_name);
        $user->username = trim($username);
        $user->email = $email;
        $user->phone = trim($phone);
        $user->city_id = $city_id;
        $user->state_id = $state_id;
        $user->country_id = $country_id;
        $user->password = Hash::make($password);
        try{
            $user->save();
            return $user;
        }catch(\Exception $e){
            Log::error($e);
            return false;
        }
    }
    
    public static function resendOtp($email){
        $user = User::where('email', $email)->first();

        if(!$user){
            return [false, 'user not found'];
        }

        $otp = OTPService::generateOtp($user->id, $user->email);

        if(!$otp[0]){
            return [false, $otp[1]];
        }

        return [true, $email];
    }
}
