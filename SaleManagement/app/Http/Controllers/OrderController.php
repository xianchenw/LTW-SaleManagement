<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index(Request $request){
        if($request->status){
            $orders = SaleOrder::where('customer_id', Auth::id())->where('status', $request->status)->get();
        }
        else{
            $orders = SaleOrder::where('customer_id', Auth::id())->get();
        }
        return view('orderDetail', compact('orders'));
    }
    public function saleOrder(Request $request){
        if($request->status){
            $orders = SaleOrder::where('status', $request->status)->get();
        }
        else{
            $orders = SaleOrder::all();
        };
        if($request->updateStatus){
            $order = SaleOrder::where('id', $request->updateStatus)->first();
            $order->update(['status' => $order->status + 1]);
        }
        return view('orderDetailAdmin', compact('orders'));
    }
}
