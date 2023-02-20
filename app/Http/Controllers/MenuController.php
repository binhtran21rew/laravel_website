<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Components\Recusive;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Termwind\Components\Dd;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;
    public function __construct(Menu $menu){
        $this->menu = $menu;
    }
    function getMenu($parentID = ''){
        $data = $this->menu->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->rootCategory($parentID);
        return $htmlOption;
    }
    public function index(){
        $menu  = $this->menu::paginate(5);
        return view('admin.menus.index', compact('menu'));
    }

    public function create(){
        $htmlOption = $this->getMenu();
        return view('admin.menus.add', compact('htmlOption'));
    }

    public function store(CategoryRequest $req){
        $this->menu->create([
            'name' => $req->name,
            'parent_id' => $req->parent_id,
            'slug' => Str::slug($req->name,'-')
        ]);

        return redirect()->route('menus.index');
    }


    public function edit($id){
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admin.menus.edit', compact('menu','htmlOption'));

    }
    public function update($id, Request $req){
        $this->menu->find($id)->update([
            'name' => $req->name,
            'parent_id' => $req->parent_id,
            'slug' => Str::slug($req->name,'-')
        ]);
        return redirect()->route('menus.index');
    }

    public function delete($id){
        try{
            $this->menu->find($id)->delete();
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
