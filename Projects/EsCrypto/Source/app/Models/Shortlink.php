<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    // protected $fillable = [
    //     'link',    // Add these two lines
    //     'hasher',  // Add these two lines
    // ];
}
