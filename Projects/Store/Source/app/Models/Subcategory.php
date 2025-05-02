<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = [];

     // products, category

public function Products()
{
    return $this->hasMany(Product::class, 'subcategory', 'id');
}

public function Category()
{
    return $this->hasMany(Product::class, 'category', 'id');
}

}
