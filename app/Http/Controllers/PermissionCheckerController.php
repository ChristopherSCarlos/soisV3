<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Auth;
use Illuminate\Support\Facades\DB;
class PermissionCheckerController extends Controller
{
    public $perms;
    public $permission;
    public $permissionID;
    public $id;
    public $permission_data;

    public function permssionChecker($permission)
    {
        if (Permission::where('name', $permission)->exists()){
            $permissionID = Permission::where('name', $permission)->value('permission_id');
            if ((Auth::user()->permissions->where('permission_id', $permissionID))->isNotEmpty())
                return true;
        }else{
            abort(403,'Unauthorized Acess.');
        }
    }
}
