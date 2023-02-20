<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;

use App\Traits\StorageImg;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    use StorageImg;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag){
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag= $tag;
        $this->productTag = $productTag;
    }
    public function index(){
        $product = $this->product::paginate(4);
        if($key = request()->key){
            $product = $this->product::where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('admin.product.index', compact('product'));
    }

    public function create(){
        
        $htmlOption = $this->getCategory();
       
        return view('admin.product.add', compact('htmlOption'));

    }
    function getCategory($parentID = ''){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->rootCategory($parentID);
        return $htmlOption;
    }

    public function store(StorePostRequest $request){
        try{
            DB::beginTransaction();
            $dataProduct = [
                "name" =>$request->name,
                "price" => $request->price,
                "content" =>$request->contents,
                "user_id" => auth()->id(),
                "category_id" => $request->category_id,
                "view_account" => 0
            ];
            
            $uploadImage = $this->storeUpload($request, 'image', 'product');
            if(!empty($uploadImage)){
                $dataProduct["image_name"] = $uploadImage["file_name"];
                $dataProduct["img_path"] = $uploadImage["file_path"];
            }
            $loadProduct = $this->product->create($dataProduct);
            // insert table product_images
            if( $request->hasFile('images')){
                foreach( $request->images as $image){
                    $product = $this->storeUploadMultiple($image, 'product');
                    $loadProduct->images()->create([
                        'path' => $product["file_path"],
                        'image_name' => $product["file_name"]
                    ]);
                }
            }
            if($request->tags){
                foreach( $request->tags as $tagItem){
                   $tags =  $this->tag::firstOrCreate(["name" => $tagItem]);
                   $tagID[] = $tags->id;
                }
                $loadProduct->relation_tags()->attach($tagID);
            }
            DB::commit();
            return redirect()->route('product.index');
        }catch(Exception $exc){
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . 'Line' . $exc->getLine());
        }
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin/product.edit', compact('htmlOption', 'product'));
    }

    public function update($id, Request $request){
        try{
            DB::beginTransaction();
            $dataProductUpdate = [
                "name" =>$request->name,
                "price" => $request->price,
                "content" =>$request->contents,
                "user_id" => auth()->id(),
                "category_id" => $request->category_id
            ];
            
            $uploadImage = $this->storeUpload($request, 'image', 'product');
            if(!empty($uploadImage)){
                $dataProductUpdate["image_name"] = $uploadImage["file_name"];
                $dataProductUpdate["img_path"] = $uploadImage["file_path"];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $loadProduct = $this->product->find($id);
            // insert table product_images
            if( $request->hasFile('images')){
                $this->productImage->where("product_id", $id)->delete();
                foreach( $request->images as $image){
                    $product = $this->storeUploadMultiple($image, 'product');
                    $loadProduct->images()->create([
                        'path' => $product["file_path"],
                        'image_name' => $product["file_name"]
                    ]);
                }
            }
            if($request->tags){
                foreach( $request->tags as $tagItem){
                   $tags =  $this->tag::firstOrCreate(["name" => $tagItem]);
                   $tagID[] = $tags->id;
                }
                $loadProduct->relation_tags()->sync($tagID);
            }
            DB::commit(); 
            return redirect()->route('product.index');
        }catch(Exception $exc){
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . 'Line' . $exc->getLine());
        }
    }


    public function delete($id){
        try{
            $this->product->find($id)->delete();
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
