<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    private $category, $product;
    public function __construct(Category $category, Product $product){
        $this->category = $category;
        $this->product = $product;
    }
    public function index($slug, $id){
        $category = $this->category::where('parent_id', 0)->get();
        $product = $this->product::where('category_id', $id)->paginate(6);
        return view('home.category.product.list', compact('category', 'product'));
    }

    public function showShop(){
        $products = $this->product::paginate(5);
        return view('home.category.shop.product', compact('products'));
    }

    public function showDetail(){
        $product = $this->product->find($_GET['id']);
        $images = $product->productImage()->where('product_id', $_GET['id'])->get();
        return view('home.category.detail.product', compact('product', 'images'));
    }

    public function showSearch(Request $request){
       if(isset($_GET['key'])){
         $search = $_GET['key'];
         $productSearch = $this->product::where('name', 'like', '%'.$search.'%')->paginate(5);
         $productSearch->appends($request->all());
         return view('home.category.shop.product', compact('productSearch'));
       }
    }
}
