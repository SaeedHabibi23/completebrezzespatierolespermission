<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function index(){
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function create(){
        return view('admin.roles.create');
    }
    public function store(){
        $role = new Role();
        $role->name = request('name');
        $role->save();
        return redirect(route('admin.roles.index'))->with('status' , 'Role Created Successfully');
    }

    public function edit(Role $role){
        $Permissions = Permission::all();

        return view('admin.roles.edit', compact('role' , 'Permissions'));
    }
    public function update(Request $request, Role $role){
        $role->update([
            'name' => $request->name // تغییر نام مجوز
        ]);
        return redirect(route('admin.roles.index'))->with('status' , 'Role Updated Successfully');
    }
    public function destroy(Role $role){
        $role->delete();
        return redirect(route('admin.roles.index'))->with('status' , 'Role Deleted Successfully');

    }

    public function givePermission(Request $request, Role $role){
        // return $request->permission
        if($role->hasPermissionTo($request->permission)){
            return redirect()->back()->with('status', 'Permission Is Exist');

        }else{
            $role->givePermissionTo($request->permission);
            return redirect()->back()->with('status', 'Permission Is Saved');

            // return redirect(route('admin.roles.index'))->with('status', 'Role Updated Successfully');
       
        }
       
    }

    public function revokePermission(Role $role, Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return redirect()->back()->with('status', 'Permission Revoked');
        }
        return redirect()->back()->with('status', 'Permission Not Exist');

        

    }



}
