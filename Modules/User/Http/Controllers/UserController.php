<?php

namespace Modules\User\Http\Controllers;

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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ]);

        if ($validator->fails()) {
            return response(['status' => false,'message' => 'Validation errors', 'message' =>  $validator->errors()], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        try {
            $user = User::create($input);
        } catch (\Exception $e) {
            Log::error("Error occur while creating this account " . $request->input('email') . json_encode($e));
            return response()->json(['status' => false, 'message' => 'Error occured while creating account', 'data' => null], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        try {
            /**Generate user accessToken **/
            $data['user'] =  $user;
            $data['token'] = $user->createToken('authToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Account created successfully!', 'data' => $data], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error("Error occur while generating token for created account " . $request->input('email') . json_encode($e));
            return response()->json(['status' => false, 'message' => 'Error occured while while generating token for created account', 'data' => null], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
