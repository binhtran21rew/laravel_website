<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class shoppingCartController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index(){
        // echo '<pre>';
        // print_r(session()->get('cart'));
        $carts = session()->get('cart');
        return view('home.shopping.cart', compact('carts'));
    }
    public function addCart($id){
        if(Auth::check()){
            // session()->flush();
            $product = $this->product::find($id);
            $cart = session()->get('cart');
            if(isset($cart[$id])){
                $cart[$id]['quantity'] =  $cart[$id]['quantity'] + 1;
            }else{
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->content,
                    'image' => $product->img_path,
                    'quantity' => 1
                ];
            }
            session()->put('cart', $cart);
            return response()->json([
                'code' =>200,
                'message' => 'success'
            ],200);
        }else{


        }
        
    }

    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartShow = view('home.component.cart', compact('carts'))->render();
            return response()->json([
                'cartView' => $cartShow,
                'code' => 200
            ], 200);
        }
    }

    public function deleteCart(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartShow = view('home.component.cart', compact('carts'))->render();
            return response()->json([
                'cartView' => $cartShow,
                'code' => 200
            ], 200);
        }
    }

    public function checkoutCart(){
        $carts = session()->get('cart');
        return view('home.shopping.checkout', compact('carts'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $unitPrice = 0 ;         
            $totalprice = 0;
            $carts = session()->get('cart');
            foreach($carts as $cart){
                
                $totalprice += $cart['price'] * $cart['quantity'];
            }
            // dd($totalprice);

            $customer = new Customer;
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->id_account = auth()->id();
            $customer->save();
            
            $bill = new Bill;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $totalprice;
            $bill->payment = $request->payment;
            $bill->save();
            foreach($carts as $key =>  $cart){
                $unitPrice =  $cart['price'] * $cart['quantity'];
                $billDetail = new Bill_detail;
                $billDetail->id_bill = $bill->id;
                $billDetail->id_product = $key;
                $billDetail->quantity = $cart['quantity'];
                $billDetail->price =  $unitPrice;
                $billDetail->save();
            }
            DB::commit(); 
            session()->forget('cart');
            return redirect()->back()->with('success', "Đặt hàng thành công");
        }catch(Exception $exc){
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . 'Line' . $exc->getLine());
            return redirect()->route('shopping.checkoutCart');
        }
       


    }
}
