<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
class ExclusiveProducts extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongTo(Product::class, 'product_code');
    }
}
