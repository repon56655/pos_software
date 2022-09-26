<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Branch;
use App\Models\Backend\Product;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=
    [
        "br_id",
        "product_id",
        "quantity"
    ];
    public function brinfo(){
        return $this->belongsTo(Branch::class,'br_id');
    }
    public function prinfo(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
