<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];

    // products, subcategory

    public function Products(){
        return $this->hasMany(Product::class, 'category', 'id');
    }


    public function Subcategory(){
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

}
