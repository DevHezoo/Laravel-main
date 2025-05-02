<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExclusiveProducts;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function exclusive()
    {
        return $this->hasOne(ExclusiveProducts::class, 'product_id');
    }
}
