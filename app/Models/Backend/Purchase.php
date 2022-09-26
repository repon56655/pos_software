<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable=
    [
        "date",
        "br_id",
        "company_name",
        "invoice",
        "product_code",
        "product_id",
        "dis",
        "dis_amount",
        "total_amount"
    ];
}
