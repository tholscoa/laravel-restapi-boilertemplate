<?php

namespace Modules\User\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Http\Services\OtpService;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * User registration endpoint 
     * @param name|string|required This the fullname of the user
     * @param email|email|required This the email of the user
     * @param password|string|required This the password of the user. This must be a strong password
     * @Response {
    *    "status": true,
    *    "message": "Account created successfully!",
    *    "data": {
    *        "user": {
    *            "name": "Tolulope Akinnuoye",
    *            "email": "akinnuoyetolulope2@gmail.com",
    *            "updated_at": "2022-04-08T18:54:04.000000Z",
    *            "created_at": "2022-04-08T18:54:04.000000Z",
    *            "id": 2
    *        },
    *        "token": "2|fNBgMgvjzbqybTszaJPoDsvo5vCl6WyVEWhpASCx"
    *    }
    *}
     */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'city_id' => 'integer',
            'state_id' => 'integer',
            'country_id' => 'required|integer',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    // ->uncompromised()
            ]
        ]);

        if ($validator->fails()) {
            return response(['status' => false,'message' => 'Validation errors', 'message' =>  $validator->errors()], 422);
        }

        $input = $request->all();
        
        $create_record = UserService::register($input['full_name'], $input['username'], $input['email'], $input['phone'], $input['city_id'], $input['state_id'], $input['country_id'],$input['password']);
       if(!$create_record){
        return response()->json(['status' => false, 'message' => 'Error occured while while creating account', 'data' => null], Response::HTTP_INTERNAL_SERVER_ERROR);
       }

       //send OTP to email for email verification
       $send_otp = OtpService::generateOtp($create_record->id, $input['email']);

       if(!$send_otp[0]){
        return response()->json(['status' => false, 'message' => 'Error occured while sending otp ', 'data' => null], Response::HTTP_INTERNAL_SERVER_ERROR);
       }

        return response()->json(['status' => true, 'message' => 'Account created successfully. An OTP has been sent to your email.', 'data' => $create_record], Response::HTTP_OK);
    }
    

    public static function verifyEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response(['status' => false, 'message' => 'Validation errors. ' .  $validator->errors(), 'data'=>false], 422);
        }
        
        $input = $request->all();
        $email = $input['email'];
        $otp = trim($input['otp']);
         
        $verify = OTPService::verifyOtp($email, $otp);

        if(!$verify[0]){
            return response(['status' => false, 'message' => $verify[1] , 'data'=>false], 422);
        }

        //update user
        try{
            $user = User::where('email', $email)->first();
            $user->email_verified = true;
            $user->email_verified_at = now();
            $user->update();
        }catch(\Exception $e){
            Log::error($e);
            return response(['status' => false, 'message' => 'error encountered while updating user record.' , 'data'=>false], 422);
        }
        NotificationService::Email($user->email, 'Your email has been successfully verified. You can now proceed to login account');
        return response(['status' => true, 'message' => $verify[1] , 'data'=>true], 200);

    }

    public function resendOtp(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response(['status' => false, 'message' => 'Validation errors. ' .  $validator->errors(), 'data'=>false], 422);
        }
        
        $input = $request->all();
        $email = $input['email'];        
         
        $resend = UserService::resendOtp($email);

        if(!$resend[0]){
            return response(['status' => false, 'message' => $resend[1] , 'data'=>false], 422);
        }

        return response(['status' => true, 'message' => "OTP code sent to " . $resend[1] , 'data'=>true], 200);

    }
    /**
     * Endpoint to show authenticated user profile.
     * @Response
     * {
    *     "status": true,
    *     "message": "User profile successfully fetched!",
    *     "data": {
    *         "id": 1,
    *         "name": "Tolulope Akinnuoye",
    *         "email": "akinnuoyetolulope@gmail.com",
    *         "email_verified_at": null,
    *         "created_at": "2022-04-08T17:40:32.000000Z",
    *         "updated_at": "2022-04-08T17:40:32.000000Z"
    *     }
    * }
     */
    public function userProfile($id)
    {
        try{
            $user = Auth::user();
            return response()->json(['status' => true, 'message' => 'User profile successfully fetched!', 'data' => $user], Response::HTTP_OK);
        }catch(\Exception){
            return response()->json(['status' => false, 'message' => 'Error occured while fetching user profile', 'data' => null], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
}
