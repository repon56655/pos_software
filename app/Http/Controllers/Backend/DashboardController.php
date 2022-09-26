<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;
use App\Models\Backend\Stock;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalProduct = Stock::sum('quantity');
        $branch = Branch::count();
        return view("backend.dashboard",compact("totalProduct","branch"));
    }
}
