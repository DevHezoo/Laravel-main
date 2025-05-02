<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    // Relationship with User model
    public function author()
    {
        return $this->belongsTo(User::class, 'article_author_id');
    }

}
