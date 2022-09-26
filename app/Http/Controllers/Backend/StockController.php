<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Stock;

class StockController extends Controller
{

    public function stock()
    {
        $stock = Stock::all();
        return view("backend.pages.stock.productreport",compact("stock"));
    }
}
