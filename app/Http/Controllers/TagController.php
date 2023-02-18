<?php

namespace App\Http\Controllers;


use App\Http\Requests\TagStoreRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Interfaces\TagServiceInterface;

class TagController extends Controller
{
    protected $tagService;
    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }

    public function show($slug){
        $tag = $this->tagService->getTagByTitle($slug);
        foreach ($tag as $post){
            $oldPosts = $post->posts->where('approved', '=', 1);
            $posts = $oldPosts->reverse();

            return view('tags.postsByTag', compact('posts'));
        }
    }

    public function create(){
        $tags = $this->tagService->getTags();

        return view('tags.create', compact('tags'));
    }

    public function store(TagStoreRequest $request){
        $this->tagService->createTag($request);

        return redirect()->back()->with('success', $request->title . ' was successfully added!');
    }
}
