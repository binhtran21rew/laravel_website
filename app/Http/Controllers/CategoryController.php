<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Components\Recusive;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category= $category;
    }
    public function create($id, $t= ''){
        $htmlOption = $this->getCategory();
        return view('admin.category.add', compact('htmlOption'));
    }


    public function index(){
        $categories = $this->category::paginate(5);
        if($key = request()->key){
            $categories = $this->category::where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('admin.category.index', compact('categories'));

    }

    public function store(CategoryRequest $req){
        $this->category->create([
            'name'=> $req->name,
            'parent_id' => $req->parent_id,
            'slug' => Str::slug($req->name,'-')
        ]);

        return redirect()->route('categories.index');
    }
    function getCategory($parentID = ''){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->rootCategory($parentID);
        return $htmlOption;
    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category','htmlOption'));
    }
    public function update($id, Request $req){
        $this->category->find($id)->update([
            'name'=> $req->name,
            'parent_id' => $req->parent_id,
            'slug' => Str::slug($req->name,'-')
        ]);

        return redirect()->route('categories.index');
    }
    public function delete($id){
            try{
                $this->category->find($id)->delete();
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
