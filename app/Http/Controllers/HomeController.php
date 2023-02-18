<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateDataRequest;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\UnderCategoryServiceInterface;


class HomeController extends Controller
{
    protected $postService;
    protected $categoryService;
    protected $tagService;
    protected $underCategoryService;

    public function __construct(PostServiceInterface $postService, CategoryServiceInterface $categoryService, TagServiceInterface $tagService, UnderCategoryServiceInterface $underCategoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->underCategoryService = $underCategoryService;
    }

    public function index(){
        $posts = $this->postService->getAllPosts();
        $tags = $this->tagService->getTags();

        return view('homepage', compact('posts', 'tags'));
    }

    public function show($category, $title){
        $show = $this->postService->showPost($title, $category);

        return view('showpost', compact('show'));
    }

    public function edit($id){
        $post = $this->postService->getById($id);
        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getTags();
        $undercategories = $this->underCategoryService->getAll();

        return view('editpost', compact('post', 'categories', 'tags', 'undercategories'));
    }

    public function update(PostUpdateDataRequest $request, $id){
        $this->postService->postSyncUnderCategory($request, $id);
        $this->postService->postSyncTags($request, $id);
        $this->postService->postUpdate($request, $id);

        return redirect()->route('home')->with('success', 'Post id:' . $id . ', was successfully updated!');
    }
}
