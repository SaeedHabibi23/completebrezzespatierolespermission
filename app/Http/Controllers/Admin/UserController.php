<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role', compact('user', 'roles' , 'permissions'));
    }
    
    


    public function assignRole(Request $request, User $user){
        // return $request->permission
        if($user->hasRole($request->role)){
            return redirect()->back()->with('status', 'Role Is Exist');

        }else{
            $user->assignRole($request->role);
            return redirect()->back()->with('status', 'Role Is Saved');

            // return redirect(route('admin.roles.index'))->with('status', 'Role Updated Successfully');
       
        }
       
    }

    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return redirect()->back()->with('status', 'Role Revoked');
        }
        return redirect()->back()->with('status', 'Role Not Exist');
    }


    public function assignpermission(Request $request, User $user){
        // return $request->permission
        if($user->hasPermissionTo($request->permission)){
            return redirect()->back()->with('status', 'Permission Is Exist');

        }else{
            $user->givePermissionTo($request->permission);
            return redirect()->back()->with('status', 'Permission Is Saved');

            // return redirect(route('admin.roles.index'))->with('status', 'Role Updated Successfully');
       
        }
       
    }

    public function removepermission(User $user, Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return redirect()->back()->with('status', 'Permission Revoked');
        }
        return redirect()->back()->with('status', 'Permission Not Exist');

        

    }
}
