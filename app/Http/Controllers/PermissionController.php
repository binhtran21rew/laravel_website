<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller{ 
    private $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function createPermission(){
        return view('admin.permission.create');
    }
    public function storePermission(Request $request){
        $permission =  $this->permission::create([
            'name' => $request->moduleParent,
            'display_name' => $request->moduleParent,
            'parent_id' => 0,
            'key' => ''
        ]);

        foreach($request->moduleChild as $data){
            $this->permission::create([
                'name' =>  $data,
                'display_name' =>  $data,
                'parent_id' => $permission->id,
                'key' => $request->moduleParent . '_'. $data
            ]);
        }
    }
}
