<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;

class RoleController extends Controller
{
    private $role, $permissions;
    public function __construct(Role $role, Permission $permissions)
    {
        $this->role = $role;
        $this->permissions = $permissions;
    }
    public function index(){
        $roles = $this->role::paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function create(){
        $permissions = $this->permissions->where('parent_id', 0)->get();

        return view('admin.role.create', compact('permissions'));
    }
    public function store(RoleRequest $request){
        $role = $this->role->create([
            'name' =>$request->name,
            'display_name' =>$request->display_name
        ]);
        $role->permission()->attach($request->permission);
        return redirect()->route('roles.index');
    }

    public function edit($id){
        $permissions = $this->permissions->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permission = $role->permission;
        return view('admin.role.edit', compact('permissions' , 'role', 'permission'));
    }

    public function update($id, Request $request){
        $this->role->find($id)->update([
            'name' =>$request->name,
            'display_name' =>$request->display_name
        ]);
        $role = $this->role->find($id);
        $role->permission()->sync($request->permission);
        return redirect()->route('roles.index');
    }

}
