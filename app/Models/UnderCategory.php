<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UnderCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'slug',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
