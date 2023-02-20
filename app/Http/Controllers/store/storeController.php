<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class storeController extends Controller
{
    private $slider, $category, $product;
    public function __construct(Slider $slider, Category $category, Product $product){
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }
    public function index(){
        $sliders = $this->slider::Latest()->get();
        $categories = $this->category::where('parent_id',0)->get();
        $listHP = $this->product::Latest()->where('category_id', '21')->get();
        $listAS = $this->product::Latest()->where('category_id', '6')->get();
        $listSS = $this->product::Latest()->where('category_id', '5')->get();
        $listIp = $this->product::Latest()->where('category_id', '4')->get();
        $listVV = $this->product::Latest()->where('category_id', '32')->get();

        

        $productRecomment = $this->product::Latest('view_account', 'desc')->take(6)->get();

        $list = [
            [
                'Iphone' => $listIp,
                'Samsung' => $listSS,
                'Asus' => $listAS,
                'HP' => $listHP,
                "Vivo" => $listVV
            ]
        ];
        return view('home.index', compact('sliders', 'categories', 'list', 'productRecomment'));
    }
}
