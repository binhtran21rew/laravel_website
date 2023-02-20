<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $user, $role;
    public function __construct(User $user, Role $role){   
        $this->user = $user;
        $this->role = $role;
    }
    public function index(){
        $users = $this->user::paginate(5);
        // $user = $this->user->all();
        // // dd($user);
        // $roleUser = $user->roles;
        if($key = request()->key){
            $users = $this->user::where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('admin.user.index', compact('users'));
    }
    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(UserRequest $request){
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "rule" => 1
            ]);
            $user->roles()->attach($request->role);
            DB::commit();
            return redirect()->route('users.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error("Message: " . $e->getMessage() . 'Line' . $e->getLine());
            return redirect()->route('users.create');
        }
    }

    public function edit($id){
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $roleUser = $user->roles;
        // dd($roleUser);
       
        return view('admin.user.edit',compact('roles', "user", 'roleUser'));
    }

    public function update($id, Request $request){
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role);
            DB::commit();
            return redirect()->route('users.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error("Message: " . $e->getMessage() . 'Line' . $e->getLine());
            return redirect()->route('users.create');

        }
    }

    public function delete($id){
        try{
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'delete successful'
            ], 200);
        }catch(Exception $exc){
            Log::error("Message: " . $exc->getMessage() . 'Line' . $exc->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'delete failed'
            ], 500);
        }
    }
}
