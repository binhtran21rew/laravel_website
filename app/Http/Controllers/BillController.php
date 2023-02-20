<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller{
    private $customer, $product, $bill, $billDetail;
    function __construct(Customer $customer, Product $product, Bill $bill, Bill_detail $billDetail){
            $this->customer = $customer;
            $this->product = $product;
            $this->bill = $bill;
            $this->billDetail = $billDetail;
    }

    public function index(){
        $orders = DB::table('bills')
        ->join('customers', 'bills.id_customer','=' ,'customers.id')
        ->select('bills.*', 'customers.name')->get();
        if($key = request()->key){
            $orders = DB::table('bills')
            ->join('customers', 'bills.id_customer','=' ,'customers.id')
            ->select('bills.*', 'customers.name')
            ->where('name', 'like', '%'.$key.'%')->get();
            // $this->product::where('name','like','%'.$key.'%')->paginate(5);
        }
        // dd($orders);
        return view('admin.bill.index', compact('orders'));
    }

    public function viewOrder($id){
        $orders_id = DB::table('bill_details')
        ->join('bills', 'bill_details.id_bill','=' ,'bills.id')
        ->join('products', 'bill_details.id_product','=' ,'products.id')
        ->select('bills.*', 'products.*', 'bill_details.*')->get()->where('id_bill', $id);
        
        $orders = DB::table('bills')
        ->join('customers', 'bills.id_customer','=' ,'customers.id')
        ->select('bills.*', 'customers.name', 'customers.gender','customers.email','customers.address','customers.phone')->get()->where('id', $id);
        // dd($orders_id);
        return view('admin.bill.viewOrder', compact('orders_id', 'orders'));
    }
}
