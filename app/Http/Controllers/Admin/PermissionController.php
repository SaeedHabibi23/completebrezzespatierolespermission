<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index(){
        $Permissions = Permission::all();
        return view('admin.permissions.index', compact('Permissions'));
    }
    public function create(){
        return view('admin.permissions.create');
    }
    public function store(){
        $Permission = new Permission();
        $Permission->name = request('name');
        $Permission->save();
        return redirect(route('admin.permission.index'))->with('status' , 'Permission Created Successfully');
    }
    public function edit(Permission $permission){
        return view('admin.permissions.edit', compact('permission'));
    }
    public function update(Request $request, Permission $permission){
        $permission->update([
            'name' => $request->name // تغییر نام مجوز
        ]);
        return redirect(route('admin.permission.index'))->with('status' , 'Permission Created Successfully');
    }
    public function destroy(Permission $permission){
        $permission->delete();
        return redirect(route('admin.permission.index'))->with('status' , 'Permission Deleted Successfully');

    }
}
