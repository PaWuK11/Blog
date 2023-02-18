<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'description',
        'slug'
    ];



    public function keyWords(){
        return $this->belongsToMany(KeyWord::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function undercategories(){
        return $this->belongsToMany(UnderCategory::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = ucfirst($value);
    }

    public function getContentAttribute($value){
        return ucfirst($value);
    }

    public function getData(){
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
