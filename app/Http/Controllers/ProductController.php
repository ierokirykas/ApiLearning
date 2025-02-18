<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Psy\Input\FilterOptions;

class ProductController extends Controller
{
    public function index()
    { 
        $product = Product::all();
        return response()->json($product);
    }
    public function store(Request $request){
        $product = Product::createProduct($request->all());
        return response()->json($product);
    }
    public function show(product $product){
        return response()->json($product);
    }
    public function update(Request $request,product $product){
        $product
        ->updateStatus($request['status'])
        ->updateStock($request['stock'])
        ->updatePrice($request['price']);
        return response()->json($product);
    }
    public function delete(product $product){
        $product->delete();
        return response()->json(['success'=>true]);
    }
}
