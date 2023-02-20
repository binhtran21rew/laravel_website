<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Slider;
use App\Traits\StorageImg;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{

    use StorageImg;
    private $slider;
    public function __construct(Slider $slider)
    {   
        $this->slider = $slider;
    }
    public function index(){
        $slider = $this->slider::paginate(5);
        if($key = request()->key){
            $slider = $this->slider::where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('admin.slider.index', compact('slider'));
    }
    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request){
        $dataSlider = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $loadSlider = $this->storeUpload($request, 'image', 'slider');
        if(!empty($loadSlider)){
            $dataSlider["img_name"] = $loadSlider["file_name"];
            $dataSlider["img_path"] = $loadSlider["file_path"];
        }
        $this->slider->create($dataSlider);
        return redirect()->route('slider.index');
    }

    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update($id, Request $request){
        $dataSlider = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $loadSlider = $this->storeUpload($request, 'image', 'slider');
        if(!empty($loadSlider)){
            $dataSlider["img_name"] = $loadSlider["file_name"];
            $dataSlider["img_path"] = $loadSlider["file_path"];
        }
        $this->slider->find($id)->update($dataSlider);
        return redirect()->route('slider.index');
    }


    public function delete($id){
        try{
            $this->slider->find($id)->delete();
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
