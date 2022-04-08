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
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        Role::findOrCreate('super-admin');
        Permission::findOrCreate('create-permissions');
        Permission::findOrCreate('edit-permissions');
        Permission::findOrCreate('delete-permissions');
        Permission::findOrCreate('assign-permissions');
        Permission::findOrCreate('revoke-permissions');
        Permission::findOrCreate('view-permissions');
        Permission::findOrCreate('view-all-permissions');

    }

    public static function getMyPermissions(){
        $userCan = Auth::user()->can('view-permissions');
        if($userCan){
            $permissions = Auth::user()->permissions;
            return response()->json(['status' => true, 'message' => 'Success', 'data' => $permissions], Response::HTTP_OK);
        }
        return response()->json(['status' => false, 'message' => 'Permission denied', 'data' => null], Response::HTTP_UNAUTHORIZED);

    }

    public static function getAllPermissions(){
        $userCan = Auth::user()->can('view-all-permissions');
        if($userCan){
            $permissions = Permission::all();
            return response()->json(['status' => true, 'message' => 'Success', 'data' => $permissions], Response::HTTP_OK);
        }
        return response()->json(['status' => false, 'message' => 'Permission denied', 'data' => null], Response::HTTP_UNAUTHORIZED);
    }

    
    /**
     * Assign new permission to user
     * @param email|email|required This the email of the user you want to assign permission to
     * @param permission_id|string|required Permission Id to be assigned to the user
     * @return JSONResponse
     */

    public function assignRevokePermissions($action, Request $request)
    {
        if($action == 'assign' || $action == 'revoke'){
            $userCan = Auth::user()->can('assign-permissions');
            
            if($userCan){
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'permissions' => 'required|array'
                ]);
                if ($validator->fails()) {
                    return response(['status' => false,'message' => 'Validation errors', 'data' =>  $validator->errors()], 422);
                }
    
                $user = User::whereEmail($request['email'])->first();
                try{
                    if($action == 'assign'){
                        $user->givePermissionTo($request['permissions']);
                        return response()->json(['status' => true, 'message' => 'Permission(s) successfully assigned', 'data' => $user->permissions], Response::HTTP_OK);
                    }
                    $user->revokePermissionTo($request['permissions']);
                    return response()->json(['status' => true, 'message' => 'Permission(s) successfully revoked', 'data' => $user->permissions], Response::HTTP_OK);
                }catch(\Exception){
                    return response()->json(['status' => false, 'message' => 'Error occured while assigning permissions', 'data' => null], Response::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        }
        return response(['status' => false,'message' => 'Invalid action called', 'data' =>  null], 422);

    }

    
}
