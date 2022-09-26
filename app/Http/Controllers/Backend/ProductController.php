<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Product;
class ProductController extends Controller
{
    public function add(){return view("backend.pages.product.manage");}
    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'name'=>'required',
            'des'=>'required',
            'size'=>'required',
            'color'=>'required',
            'product_code'=>'required',
            'sale_price'=>'required',
            'cost_price'=>'required'
        ]);
        if($valid->fails()){
            return response()->json([
                'status'=>'faild',
                'errors'=>$valid->messages()
            ]);
        }
        else{
            $Product =new Product;
            $Product->name = $request->name;
            $Product->des = $request->des;
            $Product->size = $request->size;
            $Product->color = $request->color;
            $Product->product_code = $request->product_code;
            $Product->cost_price = $request->cost_price;
            $Product->sale_price = $request->sale_price;
            $Product->save();
            return response()->json([
                'status'=>'success'
            ]);
        }


    }
    public function show(){
        $product = Product::all();
        return response()->json([
            'data'=>$product
        ]);
    }
    public function edit($id){
        $product = Product::find($id);
        return response()->json([
            'data'=>$product
        ]); 
    }
    public function update(Request $request, $id){
        $Product =Product::find($id);
        $Product->name = $request->name;
        $Product->des = $request->des;
        $Product->size = $request->size;
        $Product->color = $request->color;
        $Product->product_code = $request->product_code;
        $Product->cost_price = $request->cost_price;
        $Product->sale_price = $request->sale_price;
        $Product->update();
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status'=>"success"
        ]);
    }
}
