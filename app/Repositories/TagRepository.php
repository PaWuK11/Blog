<?php


namespace App\Repositories;


use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Support\Str;

class TagRepository extends CoreRepository implements TagRepositoryInterface
{
    public function getModel()
    {
        return Tag::class;
    }

    public function getAll()
    {
        return $this->start()->orderBy('title')->get();
    }

    public function getTag($tag){
        return $this->start()->where('slug', '=', $tag)->get();
    }

    public function create($request){
        return $this->start()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
        ]);
    }
}
