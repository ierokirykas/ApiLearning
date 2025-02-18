<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return response()->json($orders);
    }
    public function show(order $order){
        return response()->json($order);
    }
    public function store(Request $request){   
        $order = Order::createOrder($request->all());
        return response()->json($order,201);
    }
    public function update(Request $request, Order $order){
        $order //По хорошему здесь бы проверка на существование строки не помешала
        ->updateStatus($request['status'])
        ->updatePaymentStatus($request['payment_status'])
        ->updateShippingStatus($request['shipping_status'])
        ->updateQuantity($request['quantity']);
        return response()->json($order,418);
    }
    public function delete(Order $order){
        $order->cancel();
        return response()->json(['success'=>true]);
    }
}