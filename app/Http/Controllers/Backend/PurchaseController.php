<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;
use App\Models\Backend\Product;
use App\Models\Backend\Stock;
use App\Models\Backend\Purchase;

class PurchaseController extends Controller
{
    public function add(){
        $branch = Branch::all();
        return view("backend.pages.purchase.add",compact("branch"));
    }
    public function store(Request $request){
        $Purchase = new Purchase;
        $Purchase-> date  = $request->date;
        $Purchase-> br_id = $request->br_id;
        $Purchase-> company_name = $request->company_name;
        $Purchase-> invoice = $request->invoice;
        $Purchase-> product_id = $request->product_id;
        $Purchase-> dis = $request->dis;
        $Purchase-> dis_amount = $request->dis_amount;
        $Purchase-> total_amount = $request->total_amount;

        $stock = Stock::where('product_id',$request->product_id)->where('br_id',$request->br_id)->get();
        if($stock->isEmpty()){

            $stock = new Stock;
            $stock-> br_id = $request->br_id;
            $stock-> product_id = $request->product_id;
            $stock-> quantity = $request->qnt;
            $stock->save();
        }
        else{
            foreach($stock as $stock){
            $stock-> quantity = $stock-> quantity + $request->qnt;
            $stock->update();
            }
        }
        $Purchase->save();

        return response()->json([
            'status'=>"success"
        ]);
    }
    public function show(){}
    public function edit($id){}
    public function update(Request $request,$id){}
    public function destroy($id){}

    public function find($id){

        $Product = Product::find($id);
        $stock = Stock::where('product_id',$id)->get();
        return response()->json([
            "product"=>$Product,
            "stock"=>$stock
        ]);
    }

}
